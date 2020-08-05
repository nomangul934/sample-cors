<?php

namespace App\Http\Controllers\Admin;

use App\Mail\SchoolFairDisApprovedMail;
use App\Mail\SchoolFairRequestMail;
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
use View;

class ManageFairsController extends Controller
{
    /**
     * get list of school fairs
     */
    public function index(Request $request) {
        $request->flash();

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
            $curriculum = $request->input('curriculum');

            if($curriculum > 0){
                $all_fairs->where('schools.curriculum_id', '=', $curriculum);
            }

        }

        $fairs= $all_fairs->paginate(5)->appends(Input::except('page'))->onEachSide(1);

        $curricula = Curriculum::all();


        return view('admin.manage_fairs.index', [
            'fairs' => $fairs,
            'curricula' => $curricula
        ]);

    }

    public function create( ) {
        $schools = School::get();
        return view('admin.manage_fairs.create',compact(['schools']));
    }
    public function store(Request $request) {

        // print_r("true");
        $validator = Validator::make($request->all(), [
            'school' => 'required',
            'start_date' => 'bail|required|date',
            'start_time' => 'bail|required',
            'end_date' => 'bail|required|date|after_or_equal:start_date',
            'end_time' => 'bail|required',
            'students_grade12_number' => 'bail|required|numeric|min:1',
            'students_grade11_number' => 'bail|required|numeric|min:1',
            'universities_max' => 'bail|required|numeric|min:1'
        ]);

        if ($validator->fails()) {
            return redirect()->route('admin.create_fair')
                ->withErrors($validator)
                ->withInput();
        }


        $start_date_1 = $request->get('start_date').' '.$request->get('start_time');
        $start_date = Carbon::createFromFormat('m/d/Y H:i a', $start_date_1)
            ->format('Y-m-d H:i');

        $end_date_1 = $request->get('end_date').' '.$request->get('end_time');
        $end_date = Carbon::createFromFormat('m/d/Y H:i a', $end_date_1)
            ->format('Y-m-d H:i');

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



        $this->sendNotifyToUniversities($fair);

        return redirect()->route('admin.manage_fairs');

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
    public function edit($id) {
        $fair = Fair::where('id', $id)->get();
        $schools = School::get();
        return view('admin.manage_fairs.edit', compact(['fair','schools']));
    }

    public function delete($id) {        
        Fair::where('id',$id)->delete();
        Invitation::where('fair_id',$id)->delete();
        return redirect()->route('admin.manage_fairs')->with([
            'error' => false,
        'message' => 'Fair deleted successfully !']);
    }
    public function update(Request $request, $id) {

        $validator = Validator::make($request->all(), [
            'school_name' => 'required',
            'start_date' => 'bail|required|date',
            'end_date' => 'bail|required|date|after_or_equal:start_date',
            'students_grade12_number' => 'bail|required|numeric|min:1',
            'students_grade11_number' => 'bail|required|numeric|min:1',
            'universities_max' => 'bail|required|numeric|min:1'
        ]);

        if ($validator->fails()) {
            return redirect()->route('admin.edit_fair', ['id' => $id])
                ->withErrors($validator)
                ->withInput();
        } 

        $school_id = $request->get('school_id');
       
        $start_date_1 = $request->get('start_date');
        $start_time = $request->get('start_time');

        $start_date = date('Y-m-d H:i:s', strtotime("$start_date_1 $start_time"));

        $end_date_1 = $request->get('end_date');
        $end_time = $request->get('end_time');

        $end_date = date('Y-m-d H:i:s', strtotime("$end_date_1 $end_time"));

        $fair = Fair::find($id);
        $fair->school_id = $school_id;
        $fair->start_date = $start_date;
        $fair->end_date = $end_date;
        $fair->students_grade12_number = $request->input('students_grade12_number');
        $fair->students_grade11_number = $request->input('students_grade11_number');
        $fair->universities_max = $request->input('universities_max');

        $app_state = $fair->app_state;
        $fair->app_state = $app_state;
        $fair->save();


        $school = School::find($school_id);

        $content['schoolname'] = $school->name;
        $content['startdate'] = $start_date_1;
        $content['starttime'] = $start_time;
        $content['enddate'] = $end_date_1;
        $content['endtime'] = $end_time;
        $content['from'] = $school->email;

        $invitations = Invitation::where('fair_id', '=',$id)->get();
//        $invitation = Invitation::where('fair_id', '=',$id)->first();
//
        $universities =[];
        
        //$content['url'] = "test URL";
         //Mail::to("ivitob79@gmail.com")->send(new SchoolFairUpdateMail($content,"test"));
         
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

                        Mail::to($bb_email)->send(new SchoolFairUpdateMail($content,$message));
                         
                    }

                }
            }
        }


        return redirect()->route('admin.manage_fairs')->with([
            'error' => false,
            'message' => 'Fair updated successfully !'
        ]);

        //Updated by @Prasad
        //Send notification to all Universities using mail

    }
    public function appFair($id){
        $fair = Fair::find($id);
        if($fair->app_state==1){
            return redirect()->route('admin.edit_fair',['id'=>$id])->with([
                'error' => true,
                'message' => 'Fair already approved!'
            ]);
        }

        $fair->app_state = 1;
        $fair->save();

        $universities = University::all();



        $school = School::find($fair->school_id);

        $start_date = date('Y-m-d',strtotime($fair->start_date));
        $start_time = date('h:i A',strtotime($fair->start_date));
        $end_date = date('Y-m-d',strtotime($fair->end_date));
        $end_time = date('h:i A',strtotime($fair->end_date));

        $content['schoolname'] = $school->name;
        $content['startdate'] = $start_date;
        $content['starttime'] = $start_time;
        $content['enddate'] = $end_date;
        $content['endtime'] = $end_time;
        $content['from'] = $school->email;

        foreach ($universities as $university){
            $invitation = new Invitation();
            $invitation->fair_id = $fair->id;
            $invitation->university_id = $university->id;
            $invitation->save();
            if(isset($university) && $university){

                $bb_email = $university->email;//
                $message = '';

                if ($bb_email){
                    
                    
                    Mail::to($bb_email)->send(new SchoolFairUpdateMail($content,$message));
                    // Mail::to('tinycoding5@gmail.com')->send(new SchoolFairUpdateMail($content,$message));
                }

            }
        }

        return redirect()->route('admin.edit_fair',['id'=>$id])->with([
            'error' => false,
            'message' => 'Fair approved successfully !'
        ]);
    }
    public function nppFair($id){
        $fair = Fair::find($id);

        if($fair->app_state==2){
            return redirect()->route('admin.edit_fair',['id'=>$id])->with([
                'error' => true,
                'message' => 'Fair already disapproved!'
            ]);
        }
        $fair->app_state = 0;
        $fair->save();
        $school = School::find($fair->school_id);

        $invitations = Invitation::where('fair_id', '=', $fair->id)->get();
        foreach ($invitations as $invitation){
            $invitation->delete();
        }

        $start_date = date('Y-m-d',strtotime($fair->start_date));
        $start_time = date('h:i A',strtotime($fair->start_date));
        $end_date = date('Y-m-d',strtotime($fair->end_date));
        $end_time = date('h:i A',strtotime($fair->end_date));

        $content['schoolname'] = $school->name;
        $content['startdate'] = $start_date;
        $content['starttime'] = $start_time;
        $content['enddate'] = $end_date;
        $content['endtime'] = $end_time;

        $school_email = $school->email;
        if(isset($school_email) && $school_email){
            Mail::to($school_email)->send(new SchoolFairDisApprovedMail($content));
            // Mail::to('tinycoding5@gmail.com')->send(new SchoolFairDisApprovedMail($content));
        }
        return redirect()->route('admin.edit_fair',['id'=>$id])->with([
            'error' => false,
            'message' => 'Fair disapproved successfully!'
        ]);
    }
    public function changeApproveState(Request $request){
        $fair_id = $request->input('fair_id');
        $app_state= $request->input('app_state');
        $fair = Fair::find($fair_id);
        $fair->app_state = $app_state;
        $fair->save();

        return response()->json(['success'=>$fair->app_state]);
    }
}
