<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Gender extends Model
{
    public $timestamps = false;
    protected $primaryKey = "gender_id";

    public function user()
    {
        return $this->hasMany('App\Models\User');
    }
}
