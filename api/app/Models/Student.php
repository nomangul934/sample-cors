<?php

namespace App\Models;

use Illuminate\Foundation\Auth\User as Authenticatable;

class Student extends Authenticatable
{


    protected $fillable = [
        'id','school_id','name','nationality_id','gender_id','email','mobile','grade_id','sm_1_id','sm_2_id',
        'sm_id_1','sm_id_2','specializations_1_id','specializations_2_id','study_destination_1_id','study_destination_2_id'
    ];

    protected $table = "students";

    public function school() {
        return $this->belongsTo('App\Models\School','school_id');
    }

    public function country() {
        return $this->belongsTo('App\Models\Country','nationality_id');
    }
    public function gender() {
        return $this->belongsTo('App\Models\Gender','gender_id');
    }
    public function grade(){
        return $this->belongsTo('App\Models\Grade','grade_id');
    }
}
