<?php

namespace App\Models;

// use Illuminate\Database\Eloquent\Factories\HasFactory;
// use Illuminate\Database\Eloquent\Model;

// class Pickupblog extends Model
// {
//     use HasFactory;
// }


use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Pickupblog extends Model
{
    use SoftDeletes;
    
    public function category() {
        return $this->belongsTo(PickupblogCategory::class, 'category_id');
    }
}