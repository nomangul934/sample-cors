<?php

namespace App\Models;

use Illuminate\Foundation\Auth\User as Authenticatable;

class Gender extends Authenticatable
{


    protected $fillable = [
        'id','alpha_1_code','gender'
    ];

    protected $table = "genders";
}
