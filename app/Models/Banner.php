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
        return url('/uploads/banner/' . $value);
    }

    public function setImageAttribute($value)
    {
        $this->attributes['image'] = basename($value);
    }
}
