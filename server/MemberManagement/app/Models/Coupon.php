<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Coupon extends Model
{
    public function users()
    {
        return $this->belongsToMany('App\Models\User');
    }
}
