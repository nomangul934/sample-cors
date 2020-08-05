<?php

namespace App\Models;

use Illuminate\Foundation\Auth\User as Authenticatable;

class Grade extends Authenticatable
{


    protected $fillable = [
        'id','grade','name'
    ];

    protected $table = "grades";
}
