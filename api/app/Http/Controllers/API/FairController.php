<?php

namespace App\Http\Controllers\API;

use App\Mail\SchoolFairDisApprovedMail;
use App\Models\Curriculum;
use App\Models\Fair;
use App\Models\Invitation;
use App\Models\University;
use Carbon\Carbon;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Validator;
//added by @Prasad
use App\Models\School;
use App\Models\User;
use App\Mail\SchoolFairUpdateMail;
//use Illuminate\Support\Facades\Mail;
use Illuminate\Validation\Rules\In;
use Mail;
use Illuminate\Support\Facades\URL;
use Illuminate\Support\Facades\Input;
use DB;

class FairController extends Controller
{
    public function getFairs(Request $request){
        $current_time = Carbon::today();

        if ($request->has('date_from') && $request->input('date_from') != '') {
            $date_from = Carbon::parse($request->input('date_from'));
        } else {
            $date_from = $current_time;
        }
        if ($request->has('date_to') && $request->input('date_to') != '') {
            $date_to = Carbon::parse($request->input('date_to'));
        } else {
            $date_to = Carbon::now()->addYears(50);
        }


        $all_fairs = Fair::selectRaw('fairs.*,
            schools.name as school_name,
            schools.city as school_city, 
            schools.logo as school_logo, 
            schools.state as school_state, 
            schools.fees_grade11 as fees_11,
            schools.fees_grade12 as fees_12,
            (fairs.students_grade11_number + fairs.students_grade12_number) as total,
            curricula.label as label,
            schools.curriculum_id as curriculum_id
        ')->leftJoin('schools', function ($join){
            $join->on('fairs.school_id', '=', 'schools.id');
        })->leftJoin('curricula', function ($join) {
            $join->on('schools.curriculum_id', '=', 'curricula.id');
        })->whereDate('fairs.start_date', '>=' ,$date_from)
            ->whereDate('fairs.start_date', '<=' ,$date_to);

        if($request->input('search')){
            $searchText = $request->input('search');
            $all_fairs->where(function($q) use ($searchText){
                $q->where('schools.name','LIKE', '%' . $searchText . '%')->orWhere('schools.city','LIKE', '%' . $searchText . '%');
            });

        }

        if($request->input('sort-option')){
            $sort_name = $request->input('sort-option');

            if ($sort_name == 'start'){
                $all_fairs->orderBy('fairs.start_date','asc');
            }
            elseif ($sort_name == 'end'){
                $all_fairs->orderBy('fairs.end_date','asc');
            }
            elseif ($sort_name == 'none'){
                $all_fairs->orderBy('fairs.start_date','asc');
            }
            else{
                $all_fairs->orderBy('total','asc');
            }
        }
        else{
            $all_fairs->orderBy('fairs.start_date','asc');
        }

        if($request->input('tuition_start') || $request->input('tuition_end')){
            $start_range = $request->input('tuition_start');
            $end_range = $request->input('tuition_end');
            if($start_range != 0 || $end_range != 100000){
                $all_fairs->whereBetween('schools.fees_grade12', [$start_range, $end_range]);
            }
        }

        if($request->input('g12_start') || $request->input('g12_end')){
            $range_start = $request->input('g12_start');
            $range_end = $request->input('g12_end');
            if($range_start != 0 || $range_end != 1000){
                $all_fairs->whereRaw(('fairs.students_grade11_number + fairs.students_grade12_number'). '>= ?', $range_start)
                    ->whereRaw(('fairs.students_grade11_number + fairs.students_grade12_number'). '<= ?', $range_end);
            }
        }
        if ($request->input('curriculum')){
            $curriculum = DB::table('curricula')->where('label', $request->input('curriculum'))->get()[0]->id;


            if($curriculum > 0){
                $all_fairs->where('schools.curriculum_id', '=', $curriculum);
            }

        }

        $fairs= $all_fairs->paginate(5)->appends(Input::except('page'))->onEachSide(1);

        $curricula = Curriculum::all();
        $data['fairs'] = $fairs;
        $data['curricula'] = $curricula;
        return response()->json($data, 200);
    }

    public function create(){
        $schools = School::get();
        return response()->json(compact(['schools']), 200);
    }

    public function getFair(Request $request){

        $fair_id = $request->input("fair_id");
        $fair = Fair::where('id', $fair_id)->get();
        $school = School::where('id', $fair[0]->school_id)->get();
        $data['fair'] = $fair[0];
        $data['school'] = $school[0];
        return response()->json($data, 200);
    }

    public function getDeleteFairs(){
        $schools = School::get();
        $fairs = Fair::get();
        $delete_fairs = DB::table('fairs')
            ->join('schools', 'fairs.school_id', '=', 'schools.id')
            ->select('fairs.id', 'schools.name', 'fairs.start_date', 'fairs.end_date',
                'fairs.students_grade12_number', 'fairs.students_grade11_number', 'fairs.universities_max', 'schools.city')
            ->get();
        return response()->json($delete_fairs, 200);
    }

    public function fairDelete(Request $request){
        $fair = Fair::find($request->input('fair_id'));
        $invitations = Invitation::where('fair_id','=',$fair->id)->get();

        if ($invitations){
            foreach ($invitations as $invitation){
                $invitation->delete();
            }
        }
        $fair->delete();
        $schools = School::get();
        $fairs = Fair::get();
        $delete_fairs = DB::table('fairs')
            ->join('schools', 'fairs.school_id', '=', 'schools.id')
            ->select('fairs.id', 'schools.name', 'fairs.start_date', 'fairs.end_date',
                'fairs.students_grade12_number', 'fairs.students_grade11_number', 'fairs.universities_max', 'schools.city')
            ->get();
        return response()->json($delete_fairs, 200);
    }

    public function updateFair(Request $request){
        $id = $request->input('fair_id');
        $school_id = $request->input('school_id');
        $fair = Fair::find($id);
        $school = School::find($school_id);
        $school->name = $request->input('school_name');
        $school->save();

        $start_date_1 = $request->input('start_date');
        $start_date = date('Y-m-d H:i:s', strtotime("$start_date_1"));

        $end_date_1 = $request->input('end_date');
        $end_date = date('Y-m-d H:i:s', strtotime("$end_date_1"));


        $fair->school_id = $school_id;
        $fair->start_date = $start_date;
        $fair->end_date = $end_date;
        $fair->students_grade12_number = (int)$request->input('students_grade12_number');
        $fair->students_grade11_number = (int)$request->input('students_grade11_number');
        $fair->universities_max = (int)$request->input('universities_max');

        $app_state = $fair->app_state;
        $fair->app_state = $app_state;
        $fair->save();

        $content['schoolname'] = $request->input('school_name');
        $content['startdate'] = $start_date_1;
        $content['enddate'] = $end_date_1;
        $content['from'] = $school->email;

        $invitations = Invitation::where('fair_id', '=',$id)->get();

        if ($app_state==1){

            foreach ($invitations as $index => $invitation){
                $university = University::find($invitation->university_id);
                $user = User::select('id')->where('university_id',$invitation->university_id)->get()->first();
                $content['url'] = URL::temporarySignedRoute(
                    'university_invitation_register', now()->addDay(), [
                    'user_id'       => $user!=null?$user->id:0,
                    'invitation_id' => $invitation->id
                ]);

                if(isset($university) && $university){

                    $bb_email = $university->email;//
                    $message = '';

                    if ($bb_email){

                        //Mail::to($bb_email)->send(new SchoolFairUpdateMail($content,$message));
                    }

                }
            }
        }

        $fair = Fair::where('id', $id   )->get();
        $school = School::where('id', $fair[0]->school_id)->get();
        $data['fair'] = $fair[0];
        $data['school'] = $school[0];
        return response()->json($data, 200);
    }

    public function approveChange(Request $request){
        $id = $request->input('fair_id');
        $fair = Fair::find($id);
        $fair->app_state = ($fair->app_state + 1) % 2;
        $fair->save();
        return response()->json(['state' => $fair->app_state], 200);
    }

    public function storeFair(Request $request){

        $start_date_1 = $request->get('start_date');
        $start_date = date('Y-m-d H:i:s', strtotime("$start_date_1"));
        $end_date_1 = $request->get('end_date');
        $end_date = date('Y-m-d H:i:s', strtotime("$end_date_1"));

        $univ_message_content = $request->input('to_university_message');
        $support_message_content = $request->input('to_support_message');
        $fair = new Fair();
        $fair->start_date = $start_date;
        $fair->end_date = $end_date;
        $fair->students_grade12_number = $request->get('students_grade12_number');
        $fair->students_grade11_number = $request->get('students_grade11_number');
        $fair->universities_max = $request->get('universities_max');

        $fair->to_univ_message = $univ_message_content;
        $fair->to_sup_message = $support_message_content;
        $fair->school_id =$request->input('school');
        $fair->save();
        return response()->json(['success' => true], 200);

        $this->sendNotifyToUniversities($fair);

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

    }
}
