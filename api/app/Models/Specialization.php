<?php

namespace App\Models;

use Illuminate\Foundation\Auth\User as Authenticatable;

class Specialization extends Authenticatable
{


    protected $fillable = [
        'id','spec_name'
    ];

    protected $table = "specializations";
}
