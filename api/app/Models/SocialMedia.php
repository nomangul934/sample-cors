<?php

namespace App\Models;

use Illuminate\Foundation\Auth\User as Authenticatable;

class SocialMedia extends Authenticatable
{


    protected $fillable = [
        'id','alpha_2_code','sm_name'
    ];

    protected $table = "social_media";
}
