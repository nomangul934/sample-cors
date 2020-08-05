<?php

namespace App\Http\Controllers\API;

use App\Models\Invitation;
use Illuminate\Support\Facades\DB;
use App\Models\Fair;
use App\Models\University;
use App\Models\Specialization;
use App\Models\Student;
use App\Models\Country;
use Carbon\Carbon;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Validator;
//added by @Prasad
use App\Models\School;
use App\Models\User;
use App\Mail\SchoolFiarupdateMail;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Facades\Input;
use App\Models\Grade;
use App\Models\Gender;

class SchoolUniversityController extends Controller
{
    public function getUniversities(Request $request) {

        $fairs = Fair::where('school_id', Auth::user()->school_id)->get();
        $school = School::find(Auth::user()->school_id);

        $all_universities = University::orderBy('created_at','asc');

        if($request->input('search')){
            $searchText = $request->input('search');
            $all_universities->where(function($q) use ($searchText){
                $q->where('name','LIKE', '%' . $searchText . '%')->orWhere('email','LIKE', '%' . $searchText . '%');
            });

        }
        $universities= $all_universities->paginate(5)->appends(Input::except('page'));
        $query = DB::table('functions')->whereNotNull('school_suspend')->get('school_suspend');

        $data['fairs'] = $fairs;
        $data['school'] = $school;
        $data['universities'] = $universities;
        $data['query'] = $query;
        return response()->json($data, 200);

    }
    public function confirmed_universities() {

        $fairs = Fair::where('school_id', Auth::user()->school_id)->get();
        $school = School::find(Auth::user()->school_id);

        $fair_ids = [];
        foreach ($fairs as $index => $fair){
            $fair_ids[$index] = $fair->id;
        }

        $invitations = Invitation::whereIn('fair_id',  $fair_ids)->where('accepted', '=', 1)->get();

        $all_universities = University::selectRaw('universities.*, invitations.accepted as invitation_accepted')->Join('invitations', function ($join){
            $join->on('universities.id', '=', 'invitations.university_id');
        })->whereIn('invitations.fair_id',$fair_ids)->where('invitations.accepted','=',1)->orderBy('universities.created_at','asc');

        $universities = $all_universities->paginate(5)->appends(Input::except('page'))->onEachSide(1);

        $query = DB::table('functions')->whereNotNull('school_suspend')->get('school_suspend');
        $data['fairs'] = $fairs;
        $data['school'] = $school;
        $data['universities'] = $universities;
        $data['query'] = $query;
        return response()->json($data, 200);

    }

    public function students_registration() {

        $fairs = Fair::where('school_id', Auth::user()->school_id)->get();
        $_students = Student::where('school_id',Auth::user()->school_id)->get();
        $school = School::find(Auth::user()->school_id);
        $students = array();
        foreach ($_students as $student){
            $student_id = $student->id;
            $student_name = $student->name;
            $student_email = $student->email;
            $student_mobile = $student->mobile;
            $student_grade = Grade::where('id',$student->grade_id)->first()->grade;
            $student_gender = Gender::where('id',$student->gender_id)->first()->gender;
            $student_spec_1 = Specialization::where('id',$student->specializations_1_id)->first()->spec_name;
            $student_spec_2 = Specialization::where('id',$student->specializations_2_id)->first()->spec_name;
            if($student->study_destination_1_id != 0){
                $student_dest_1 = Country::where('country_id',$student->study_destination_1_id)->first()->en_short_name;
            }
            else{
                $student_dest_1 = $student->study_destination_1_id;
            }
            if($student->study_destination_2_id != 0){
                $student_dest_2 = Country::where('country_id',$student->study_destination_2_id)->first()->en_short_name;
            }
            else{
                $student_dest_2 = $student->study_destination_2_id;
            }
            $_student = array(
                'id' => $student_id,
                'name' => $student_name,
                'email' => $student_email,
                'mobile' => $student_mobile,
                'grade' => $student_grade,
                'gender' => $student_gender,
                'spec_1' => $student_spec_1,
                'spec_2' => $student_spec_2,
                'dest_1' => $student_dest_1,
                'dest_2' => $student_dest_2);
            array_push($students, $_student);
        }

        $univ_lists = University::get();
        $countr  = Student::where('school_id',Auth::user()->school_id)->groupBy('study_destination_1_id')->pluck('study_destination_1_id');
        $countr2  = Student::where('school_id',Auth::user()->school_id)->groupBy('study_destination_2_id')->pluck('study_destination_2_id');
        $specs  = Student::where('school_id',Auth::user()->school_id)->groupBy('specializations_1_id')->pluck('specializations_1_id');
        $specs2  = Student::where('school_id',Auth::user()->school_id)->groupBy('specializations_2_id')->pluck('specializations_2_id');

        $countr = $countr->merge($countr2)->unique();
        $specs  = $specs->merge($specs2)->unique();

        $dest1 = array();
        $sec1  = array();

        $countr_array = [];
        $max_destination = 0;
        foreach($countr as $ctr){
            if ($ctr != 0) {
                array_push($countr_array, $ctr);
                $data = Student::where('school_id',Auth::user()->school_id)->where('study_destination_1_id',$ctr)->orWhere('study_destination_2_id',$ctr)->count();
                array_push($dest1, $data);
            }
        }
        $countr = $countr_array;
        if (!empty($dest1)) {
            $max_destination = max($dest1) * 1 + 5;
        }

        $specializations = array();

        foreach($specs as $s){
            $sel = Student::where('school_id',Auth::user()->school_id)->where('specializations_1_id',$s)->get();
            $sel2 = Student::where('school_id',Auth::user()->school_id)->where('specializations_2_id',$s)->get();
            $sel = $sel->merge($sel2)->count();
            $total = Student::where('school_id',Auth::user()->school_id)->count();
            array_push($sec1,round((($sel/$total) * 100),2));
            array_push($specializations,Specialization::where('id',$s)->first()->spec_name);
        }

        $countries  = Country::whereIn('country_id',$countr)->pluck('en_short_name')->toArray();
        $specializations  = Specialization::whereIn('id',$specs)->pluck('spec_name')->toArray();
        $spp = array();
        foreach($specializations as $sp){
            array_push($spp,$sp . ' % ');
        }

        $response['fairs'] = $fairs;
        $response['school'] = $school;
        $response['univ_lists'] = $univ_lists;
        $response['students'] = $students;
        $response['countries'] = $countries;
        $response['dist1'] = $dest1;
        $response['spp'] = $spp;
        $response['sec1'] = $sec1;
        $response['max_destination'] = $max_destination;

        return response()->json($response, 200);

    }

    public function workshop_list() {
        $fairs = Fair::where('school_id', Auth::user()->school_id)->get();
        $school = School::find(Auth::user()->school_id);
        $univ_lists = University::get();
        return response()->json(['success' => true], 200);
    }
}
