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
        return url('/uploads/brand/' . $value);
    }

    public function setLogoAttribute($value)
    {
        $this->attributes['logo'] = basename($value);
    }

}
