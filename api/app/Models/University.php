<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class University extends Model
{
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name', 'email','phone','website','map_link','compus','country','city','address','state' ,'logo','accredited','package_id',
        'school_fairs', 'school_activities' ,'email_marketing','marketing_support','digital_media_promotion',
        'digital_media_promotion_weekly','SMS_marketing'
    ];

    protected $table = "universities";

    /**
     * university's user
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    /*    
    public function user() {
        return $this->belongsTo(User::class);
    }
    */

    /**
     * university's invitations
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function invitations() {
        return $this->hasMany(Invitation::class);
    }
    public function user(){
        return $this->hasMany('App\Models\User','university_id');
    }
    public function package(){
        return $this->belongsTo('App\Models\Package','package_id');
    }

}
