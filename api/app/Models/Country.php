<?php

namespace App\Models;

use Illuminate\Foundation\Auth\User as Authenticatable;

class Country extends Authenticatable
{


    protected $fillable = [
        'num_code','alpha_2_code','alpha_3_code','en_short_name','nationality'
    ];

    protected $table = "countries";
}
