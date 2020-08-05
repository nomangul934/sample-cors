<?php

namespace App\Http\Controllers\Admin;

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


class ManageFairsController1 extends Controller
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
                        // Mail::to('tinycoding5@gmail.com')->send(new SchoolFairUpdateMail($content,$message));
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
