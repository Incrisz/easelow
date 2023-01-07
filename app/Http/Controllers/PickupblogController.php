<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Models\Pickupblog;
use App\Models\PickupblogCategory;
use Illuminate\Http\Request;

class PickupblogController extends Controller
{
    public function __construct() {
        // Staff Permission Check
        $this->middleware(['permission:view_pickupblogs'])->only('index');
        $this->middleware(['permission:add_pickupblog'])->only('create');
        $this->middleware(['permission:edit_pickupblog'])->only('edit');
        $this->middleware(['permission:delete_pickupblog'])->only('destroy');
        $this->middleware(['permission:publish_pickupblog'])->only('change_status');
    }
    
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        $sort_search = null;
        $blogs = Pickupblog::orderBy('created_at', 'desc');
        
        if ($request->search != null){
            $blogs = $blogs->where('title', 'like', '%'.$request->search.'%');
            $sort_search = $request->search;
        }
        

        $blogs = $blogs->paginate(15);

        return view('backend.pickupblog_system.blog.index', compact('blogs','sort_search'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $blog_categories = PickupblogCategory::all();
        return view('backend.pickupblog_system.blog.create', compact('blog_categories'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        
        $request->validate([
            'category_id' => 'required',
            'title' => 'required|max:255',
        ]);

        $blog = new Pickupblog;
        
        $blog->category_id = $request->category_id;
        $blog->title = $request->title;
        $blog->banner = $request->banner;
        $blog->slug = preg_replace('/[^A-Za-z0-9\-]/', '', str_replace(' ', '-', $request->slug));
        $blog->short_description = $request->short_description;
        $blog->description = $request->description;
        
        $blog->meta_title = $request->meta_title;
        $blog->meta_img = $request->meta_img;
        $blog->meta_description = $request->meta_description;
        $blog->meta_keywords = $request->meta_keywords;
        
        $blog->save();

        flash(translate('Pickup has been created successfully'))->success();
        return redirect()->route('pickupblog.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $blog = Pickupblog::find($id);
        $blog_categories = PickupblogCategory::all();
        
        return view('backend.pickupblog_system.blog.edit', compact('blog','blog_categories'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {        
        $request->validate([
            'category_id' => 'required',
            'title' => 'required|max:255',
        ]);

        $blog = Pickupblog::find($id);

        $blog->category_id = $request->category_id;
        $blog->title = $request->title;
        $blog->banner = $request->banner;
        $blog->slug = preg_replace('/[^A-Za-z0-9\-]/', '', str_replace(' ', '-', $request->slug));
        $blog->short_description = $request->short_description;
        $blog->description = $request->description;
        
        $blog->meta_title = $request->meta_title;
        $blog->meta_img = $request->meta_img;
        $blog->meta_description = $request->meta_description;
        $blog->meta_keywords = $request->meta_keywords;
        
        $blog->save();

        flash(translate('Blog post has been updated successfully'))->success();
        return redirect()->route('pickupblog.index');
    }
    
    public function change_status(Request $request) {
        $blog = Pickupblog::find($request->id);
        $blog->status = $request->status;
        
        $blog->save();
        return 1;
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        Pickupblog::find($id)->delete();
        
        return redirect('admin/pickupblogs');
    }


    public function all_blog() {
        $blogs = Pickupblog::where('status', 1)->orderBy('created_at', 'desc')->paginate(12);
        return view("frontend.pickupblog.listing", compact('blogs'));
    }
    
    public function blog_details($slug) {
        $blog = Pickupblog::where('slug', $slug)->first();
        return view("frontend.pickupblog.details", compact('blog'));
    }
}
