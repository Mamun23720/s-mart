<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Banner extends Model
{
    use HasFactory;

    protected $guarded = [];
 
    public function getImageAttribute($value)
    {
        if ($value) {
        return url('/uploads/banner/' . $value);
        }
        else{
            return url('/uploads/banner.jpg');
        }
    }
}
