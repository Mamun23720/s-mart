<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Category extends Model
{

    use HasFactory;

    protected $guarded = [];

    public function parent()
    {
        return $this->hasOne(Category::class, 'id' , 'parent_id');
    }

    public function getImageAttribute($value)
    {
        if ($value) {
            return url('/uploads/category/' . $value);
            }
            else{
                return url('/uploads/category.png');
            }
    }
}
