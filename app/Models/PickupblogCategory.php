<?php

namespace App\Models;

// use Illuminate\Database\Eloquent\Factories\HasFactory;
// use Illuminate\Database\Eloquent\Model;

// class PickupblogCategory extends Model
// {
//     use HasFactory;
// }


use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class PickupblogCategory extends Model
{
    use SoftDeletes;
    
    public function posts()
    {
        return $this->hasMany(Pickupblog::class);
    }
}