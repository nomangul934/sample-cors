<?php

namespace App\Http\Controllers\API;

use App\Mail\SchoolFairRequestMail;
use App\Mail\SchoolFairUpdateMail;
use http\Env\Response;
use Illuminate\Support\Facades\DB;
use App\Models\Fair;
use App\Models\University;
use Carbon\Carbon;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Input;
use Illuminate\Support\Facades\Validator;
//added by @Prasad
use App\Models\School;
use App\Models\User;
use Illuminate\Support\Facades\Mail;

class SchoolFairController extends Controller
{

    public function getFairs(){
        $fairs = Fair::where('school_id', Auth::user()->school_id)->get();
        $school = School::find(Auth::user()->school_id);
        $data['fairs'] = $fairs;
        $data['school'] = $school;
        return response()->json($data, 200);
    }

    public function storeFair(Request $request){

        $start_date_1 = $request->input('start_date');
        $start_date = date('Y-m-d H:i:s', strtotime("$start_date_1"));


        $end_date_1 = $request->input('end_date');
        $end_date = date('Y-m-d H:i:s', strtotime("$end_date_1"));

        $univ_message_content = $request->input('to_university_message');
        $support_message_content = $request->input('to_support_message');

        $fair = new Fair();


        $fair->start_date = $start_date;
        $fair->end_date = $end_date;
        $fair->students_grade12_number = (int)$request->get('students_grade12_number');
        $fair->students_grade11_number = (int)$request->get('students_grade11_number');
        $fair->universities_max = (int)$request->get('universities_max');

        $fair->to_univ_message = $univ_message_content;
        $fair->to_sup_message = $support_message_content;
        $fair->school_id = auth()->user()->school_id;

        $fair->save();


        //$this->sendNotifyToUniversities($fair);
        return response()->json(['success' => true], 200);

    }

    public function editFair(Request $request){

        $id = $request->input('fair_id');
        $fair = Fair::where('school_id', Auth::user()->school_id)
            ->where('id', $id)->first();
        $school = School::where('id', Auth::user()->school_id)->get()->first();

        $all_universities = University::selectRaw('universities.*')->leftJoin('invitations', function ($join){
            $join->on('universities.id', '=', 'invitations.university_id');
        })->where('invitations.fair_id', '=', $fair->id)->where('invitations.accepted', '=', 1)->orderBy('universities.created_at', 'asc');

        $universities = $all_universities->paginate(5)->appends(Input::except('page'));
        $data['fair'] = $fair;
        $data['school'] = $school;
        $data['universities'] = $universities;
        return response()->json($data, 200);
    }

    public function updateFair(Request $request){
        $id = $request->input('fair_id');
        $school_id = $request->input('school_id');

        $start_date_1 = $request->input('start_date');
        $start_date = date('Y-m-d H:i:s', strtotime("$start_date_1"));


        $end_date_1 = $request->input('end_date');
        $end_date = date('Y-m-d H:i:s', strtotime("$end_date_1"));

        $univ_message_content = $request->input('to_university_message');
        $support_message_content = $request->input('to_support_message');

        $fair = Fair::find($id);

        $fair->start_date = $start_date;
        $fair->end_date = $end_date;
        $fair->students_grade12_number = (int)$request->get('students_grade12_number');
        $fair->students_grade11_number = (int)$request->get('students_grade11_number');
        $fair->universities_max = (int)$request->get('universities_max');
        $fair->to_univ_message = $univ_message_content;
        $fair->to_sup_message = $support_message_content;

        $fair->save();

        //$this->sendNotifyToUniversities($fair);

        return response()->json($fair, 200);
    }

    public function getParticipants(Request $request){
        $id = $request->input('fair_id');
        $universities = University::select('universities.*','users.email as useremail','users.name as username','users.phone as userphone')
            ->leftjoin('users','users.university_id','=','universities.id')->whereHas('invitations', function($query) use ($id){
                $query->where('accepted', true)->where('fair_id', $id);
            })->orderBy('universities.id','asc')->paginate(5)->appends(Input::except('page'))->onEachSide(1);;

        $school = School::where('id', Auth::user()->school_id)->get()->first();
        return response()->json($universities, 200);
    }

    public function sendNotifyToUniversities($fair) {

        $school_info = School::where('id', $fair->school_id)->get()->first();

        $universities = User::where('role','university')->select('email')->get();

        $university_emails = University::all()->pluck('email');

        $start_date = date('Y-m-d',strtotime($fair->start_date));
        $start_time = date('h:i A',strtotime($fair->start_date));
        $end_date = date('Y-m-d',strtotime($fair->end_date));
        $end_time = date('h:i A',strtotime($fair->end_date));

        $email_content = array(
            'from' => $school_info->email,
            'schoolname' => $school_info->name,
            'startdate' => $start_date,
            'starttime' => $start_time,
            'enddate'=> $end_date,
            'endtime'=> $end_time,
        );
        $to_univ_message = $fair->to_univ_message;
        $to_supp_message = $fair->to_sup_message;

        foreach ($university_emails as $university_email){
            if(isset($university_email) && $university_email && !is_null($university_email)){
                Mail::to($university_email)->send(new SchoolFairUpdateMail($email_content,$to_univ_message));
            }
        }


        Mail::to($universities)->send(new SchoolFairUpdateMail($email_content,$to_univ_message));
        Mail::to('fairs@odros.com')->send(new SchoolFairRequestMail($email_content, $to_supp_message));
        // Mail::to('tinycoding5@gmail.com')->send(new SchoolFairRequestMail($email_content, $to_supp_message));
    }
}
