<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Category extends Model
{

    use HasFactory;

    protected $guarded = [];

<<<<<<< HEAD
    // public function subcategory()
    // {
    //     return $this->hasMany(Category::class);
    // }
=======
    public function parent()
    {
        return $this->hasOne(Category::class, 'id' , 'parent_id');
    }
>>>>>>> 9a77171e4f0f7447119345a834746b1986c3bf9f
}
