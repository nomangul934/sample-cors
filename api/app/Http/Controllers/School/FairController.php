<?php

namespace App\Http\Controllers\School;
use App\Mail\SchoolFairRequestMail;
use App\Mail\SchoolFairUpdateMail;
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


class FairController extends Controller
{
    /**
     * get list of school fairs
     */
    public function index() {

        $fairs = Fair::where('school_id', Auth::user()->school_id)->get();
        $school = School::find(Auth::user()->school_id);
        $query = DB::table('functions')->whereNotNull('school_suspend')->get('school_suspend');
        return view('school.fair.index', compact(['fairs','school','query']));

    }

    /**
     * show edit fair form page
     * @param $id
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function edit($id) {
        $fair = Fair::where('school_id', Auth::user()->school_id)
            ->where('id', $id)->first();
        $school = School::where('id', Auth::user()->school_id)->get()->first();

        //dd($fair);
        $start_date_carbon = Carbon::createFromFormat('Y-m-d H:i:s', $fair->start_date);
        $start_date = $start_date_carbon->format('m/d/Y');
        $start_time = $start_date_carbon->format('H:i a');

        $end_date_carbon = Carbon::createFromFormat('Y-m-d H:i:s', $fair->end_date);
        $end_date = $end_date_carbon->format('m/d/Y');
        $end_time = $end_date_carbon->format('H:i a');

        $all_universities = University::selectRaw('universities.*')->leftJoin('invitations', function ($join){
            $join->on('universities.id', '=', 'invitations.university_id');
        })->where('invitations.fair_id', '=', $fair->id)->where('invitations.accepted', '=', 1)->orderBy('universities.created_at', 'asc');

        $universities = $all_universities->paginate(5)->appends(Input::except('page'));

        return view('school.fair.edit', compact([
            'fair', 'start_date', 'start_time', 'end_date', 'end_time','school','universities'
        ]));
    }


    public function update(Request $request, $id) {

        $validator = Validator::make($request->all(), [
            'start_date' => 'bail|required|date',
            'start_time' => 'bail|required',
            'end_date' => 'bail|required|date|after_or_equal:start_date',
            'end_time' => 'bail|required',
            'students_grade12_number' => 'bail|required|numeric|min:1',
            'students_grade11_number' => 'bail|required|numeric|min:1',
            'universities_max' => 'bail|required|numeric|min:1'
        ]);

        if ($validator->fails()) {
            return redirect()->route('school.update_fair')
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

        $fair = Fair::find($id);

        $fair->start_date = $start_date;
        $fair->end_date = $end_date;
        $fair->students_grade12_number = $request->get('students_grade12_number');
        $fair->students_grade11_number = $request->get('students_grade11_number');
        $fair->universities_max = $request->get('universities_max');
        $fair->to_univ_message = $univ_message_content;
        $fair->to_sup_message = $support_message_content;

        $fair->save();

        $this->sendNotifyToUniversities($fair);

        return redirect()->route('school.fairs_list')->with([
            'error' => false,
            'message' => 'Fair updated successfully !'
        ]);

        //Updated by @Prasad
        //Send notification to all Universities using mail

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

    /**
     * show create fair form page
     */
    public function create() {
        $school = School::find(Auth::user()->school_id);
        return view('school.fair.create',compact('school'));
    }

    public function store(Request $request) {

        $validator = Validator::make($request->all(), [
            'start_date' => 'bail|required|date',
            'start_time' => 'bail|required',
            'end_date' => 'bail|required|date|after_or_equal:start_date',
            'end_time' => 'bail|required',
            'students_grade12_number' => 'bail|required|numeric|min:1',
            'students_grade11_number' => 'bail|required|numeric|min:1',
            'universities_max' => 'bail|required|numeric|min:1'
        ]);

        if ($validator->fails()) {
            return redirect()->route('school.create_fair')
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
        $fair->school_id = auth()->user()->school_id;

        $fair->save();


        $this->sendNotifyToUniversities($fair);


        return redirect()->route('school.fairs_list')->with([
            'error' => false,
            'message' => 'Fair created successfully !'
        ]);

    }

    /**
     * get list of participants universities
     *
     * @param $id
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function participants($id) {

        $universities = University::select('universities.*','users.email as useremail','users.name as username','users.phone as userphone')
                        ->leftjoin('users','users.university_id','=','universities.id')->whereHas('invitations', function($query) use ($id){
            $query->where('accepted', true)->where('fair_id', $id);
        })->orderBy('universities.id','asc')->paginate(5)->appends(Input::except('page'))->onEachSide(1);;

        $school = School::where('id', Auth::user()->school_id)->get()->first();
        return view('school.fair.participants', [
            'universities' => $universities,
            'school' => $school
        ]);
    }
}
