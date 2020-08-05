<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class School extends Model
{
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name', 'phone', 'email', 'address1', 'address2',
        'website', 'country', 'city', 'longitude', 'latitude',
        'about_us', 'full_profile', 'logo',
        'curriculum_id', 'number_grade11', 'number_grade12', 'fees_grade11', 'fees_grade12','state','users','emails'
    ];

    /**
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    //public function user() {
    //    return $this->belongsTo(User::class);
    //}

    /**
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function curriculum() {
        return $this->belongsTo(Curriculum::class);
    }
    Public function user(){
        return $this->hasMany('App\Models\User','school_id');
    }
}
