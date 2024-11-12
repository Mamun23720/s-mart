<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;

class Customer extends Authenticatable
{
    use HasFactory;

    protected $guarded = [];

    public function setImageAttribute($value)
    {
        if ($value) {
            return url('/uploads/customer/' . $value);
            }
            else{
                return url('/uploads/customer.jpg');
            }
    }
}
