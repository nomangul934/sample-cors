<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Fair extends Model
{
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'start_date', 'end_date', 'start_time', 'end_time',
        'students_grade12_number', 'students_grade11_number', 'universities_max', 'school_id'
    ];

    /**
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function school() {
        return $this->belongsTo('App\Models\School','school_id');
    }

    public function universities(){
        return $this->belongsToMany('App\Models\University','invitations','fair_id','university_id');
    }

}
