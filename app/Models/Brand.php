<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Brand extends Model
{
    use HasFactory;

    protected $guarded = [];

    public function getLogoAttribute($value)
    {
        if ($value) {
        return url('/uploads/brand/' . $value);
        }
        else{
            return url('/uploads/brand.png');
        }
    }
}
