<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Package extends Model
{

    protected $fillable = ['package_name','listing','enhanced_listing','lead_generation','school_fairs', 'school_activities' ,'email_marketing','marketing_support','digital_media_promotion',
        'digital_media_promotion_weekly','SMS_marketing','created_at','updated_at' ];

    protected $table = "packages";
    protected $hidden = [];


}
