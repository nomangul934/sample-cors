<?php

namespace App\Http\Controllers\School;
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

class UniversityController extends Controller
{
    /**
     * get list of school fairs
     */
    public function index(Request $request) {

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
        return view('school.university.index', [
            'fairs' => $fairs,
            'school' => $school,
            'universities' => $universities,
            'query' => $query
        ] );

    }

    // public function sendNotifyToUniversities($fair) {
    //     $school_info = School::where('id', $fair->school_id)->get()->first();
    //     $universities = User::where('role','university')->select('email')->get();
    //     $email_content = array(
    //         'schoolname' => $school_info->name,
    //         'startdate' => Carbon::createFromFormat('m/d/Y H:i a', $fair->start_date)->format('Y-m-d H:i'),
    //         'starttime' => Carbon::createFromFormat('m/d/Y H:i a', $fair->start_date)->format('H:i a'),
    //         'enddate'=> Carbon::createFromFormat('m/d/Y H:i a', $fair->end_date)->format('Y-m-d H:i'),
    //         'endtime'=> Carbon::createFromFormat('m/d/Y H:i a', $fair->end_date)->format('H:i a'),
    //     );
    //     Mail::to($universities)->send(new SchoolFiarupdateMail($email_content));
    // }
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
//        dd($universities);

        $query = DB::table('functions')->whereNotNull('school_suspend')->get('school_suspend');
        return view('school.university.confirmed_universities', [
            'fairs' => $fairs,
            'school' => $school,
            'universities' => $universities,
            'query' => $query
        ]);

    }
    public function students_registration() {


        $fairs = Fair::where('school_id', Auth::user()->school_id)->get();
        $students = Student::where('school_id',Auth::user()->school_id)->get();
        $school = School::find(Auth::user()->school_id);
        $univ_lists = University::get();
        $countr  = Student::where('school_id',Auth::user()->school_id)->groupBy('study_destination_1_id')->pluck('study_destination_1_id');
        $countr2  = Student::where('school_id',Auth::user()->school_id)->groupBy('study_destination_2_id')->pluck('study_destination_2_id');
        $specs  = Student::where('school_id',Auth::user()->school_id)->groupBy('specializations_1_id')->pluck('specializations_1_id');
        $specs2  = Student::where('school_id',Auth::user()->school_id)->groupBy('specializations_2_id')->pluck('specializations_2_id');

        $countr = $countr->merge($countr2)->unique();
        $specs  = $specs->merge($specs2)->unique();

        //dd($countr);
        //dd($specs);
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
            //array_push($sec1,Student::where('school_id',Auth::user()->school_id)->where('specializations_1_id',$s)->orWhere('specializations_2_id',$s)->count());
            $sel = Student::where('school_id',Auth::user()->school_id)->where('specializations_1_id',$s)->get();
            $sel2 = Student::where('school_id',Auth::user()->school_id)->where('specializations_2_id',$s)->get();
            $sel = $sel->merge($sel2)->count();
            $total = Student::where('school_id',Auth::user()->school_id)->count();
            array_push($sec1,round((($sel/$total) * 100),2));
            array_push($specializations,Specialization::where('id',$s)->first()->spec_name);
        }

        //dd($dest1);
        $countries  = Country::whereIn('country_id',$countr)->pluck('en_short_name')->toArray();
        $specializations  = Specialization::whereIn('id',$specs)->pluck('spec_name')->toArray();
        $spp = array();
        foreach($specializations as $sp){
            array_push($spp,$sp . ' % ');
        }

        $query = DB::table('functions')->whereNotNull('school_suspend')->get('school_suspend');
        return view('school.university.students_registration', compact(['fairs','school','univ_lists','query','students','countries','dest1','spp','sec1', 'max_destination']));

    }
    public function workshop_list() {

        $fairs = Fair::where('school_id', Auth::user()->school_id)->get();
        $school = School::find(Auth::user()->school_id);
        $univ_lists = University::get();
        $query = DB::table('functions')->whereNotNull('school_suspend')->get('school_suspend');
        return view('school.workshop.index', compact(['fairs','school','univ_lists','query']));

    }

}
