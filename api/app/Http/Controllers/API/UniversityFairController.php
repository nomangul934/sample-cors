<?php

namespace App\Http\Controllers\API;

use App\Models\Curriculum;
use App\Models\Fair;
use App\Models\Invitation;
use App\Models\Package;
use App\Models\University;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
//added by @Prasad
use Carbon\Carbon;
use App\Models\School;
use App\Mail\UnviersityConfirmFairMail;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Facades\Input;

class UniversityFairController extends Controller
{
    public function getInvitations(Request $request){
        $invitations = Invitation::where('university_id', Auth::user()->university_id)->get();
        $university = University::where('id', Auth::user()->university_id)->get()->first();

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



        $all_fairs = Fair::selectRaw('fairs.*,schools.name as school_name,schools.city as school_city, schools.logo as school_logo,
         invitations.university_id as university_id,
         invitations.id as invitation_id,
         invitations.accepted as accepted,
         invitations.rejected as rejected,
         schools.curriculum_id as curriculum_id,
         schools.fees_grade11 as fees_11,
         schools.fees_grade12 as fees_12,         
         (fairs.students_grade11_number + fairs.students_grade12_number) as total,
         curricula.label as label        
          ')->leftJoin('schools', function ($join){
            $join->on('fairs.school_id', '=', 'schools.id');
        })->leftJoin('invitations', function ($join){
            $join->on('fairs.id', '=' ,'invitations.fair_id');
        })->leftJoin('curricula', function ($join){
            $join->on('schools.curriculum_id', '=', 'curricula.id');
        })->where('invitations.university_id', '=' ,$university->id)
            ->where('fairs.app_state', '=', 1)
            ->whereDate('fairs.start_date', '>=' ,$date_from)
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

        $data['fairs'] = $fairs;
        $data['curricula'] = $curricula;
        return response()->json($data, 200);
    }

    public function acceptInvitation(Request $request){
        $invitation = Invitation::find($request->get('invitation_id'));

        $university = University::where('id', Auth::user()->university_id)->get()->first();
        $package = Package::find($university->package_id);

        if($university->school_fairs == $package->school_fairs){
            return response()->json([
                'error' => true,
                'message' => 'You do not have credit. So you can not accept!'
            ], 200);
        }


        if($invitation == null){
            return response()->json([
                'error' => true,
                'message' => 'Invitation not found !'
            ], 200);
        }
        if($invitation->university->id != Auth::user()->university_id){
            return response()->json([
                'error' => true,
                'message' => 'You are not allowed to register for this fair !'
            ], 200);
        }

        $count = $university->school_fairs + 1;
        $university->school_fairs = $count;
        $university->save();

        $fair = $invitation->fair;

        $count = University::whereHas('invitations', function($query) use ($fair){
            $query->where('accepted', true)->where('fair_id', $fair->id);
        })->count();

        if($count < $fair->universities_max) {
            $invitation->accepted = true;
            $invitation->rejected = false;
            $invitation->save();

            $error = false;
            $message = 'You successfully registered !';
        }else{
            $error = true;
            $message = 'Registered universities maximum number reached !';
        }


        //Updated by @Prasad
        //Send notification to University about Fair
        // if ($error == false) $this->sendNotifyToUniversity($fair);
        return response()->json([
            'error' => $error,
            'message' => $message
        ], 200);
    }

    public function rejectInvitation(Request $request){
        $invitation = Invitation::find($request->get('invitation_id'));

        $university = University::where('id', Auth::user()->university_id)->get()->first();
        $package = Package::find($university->package_id);
        if($university->school_fairs == 0){
            return response()->json([
                'error' => true,
                'message' => 'You did not accept even one!'
            ], 200);
        }

        if($invitation == null){
            return response()->json([
                'error' => true,
                'message' => 'Invitation not found !'
            ], 200);
        }

        if($invitation->university->id != Auth::user()->university_id){
            return response()->json([
                'error' => true,
                'message' => 'You are not allowed to reject this fair !'
            ], 200);
        }

        $count = $university->school_fairs - 1;
        $university->school_fairs = $count;
        $university->save();

        $invitation->rejected = true;
        $invitation->accepted = false;
        $invitation->save();

        return response()->json([
            'error' => false,
            'message' => 'Successfully rejected !'
        ], 200);
    }

    public function getPastConfirmed(Request $request){
        $university = University::where('id', Auth::user()->university_id)->get()->first();
        $current = Carbon::today();

        $all_universities = University::selectRaw('universities.*,
                fairs.start_date as start_date,
                fairs.end_date as end_date,
                schools.name as school_name,
                schools.logo as school_logo,
                schools.fees_grade11 as fees_11,
                schools.fees_grade12 as fees_12,
                schools.number_grade11 as number_grade11,
                schools.number_grade12 as number_grade12
        
        ')->leftJoin('invitations', function ($join){
            $join->on('universities.id','=','invitations.university_id');
        })->leftJoin('fairs', function ($join){
            $join->on('invitations.fair_id','=', 'fairs.id');
        })->leftJoin('schools', function ($join){
            $join->on('fairs.school_id', '=', 'schools.id');
        })->where('universities.id','=', auth()->user()->university_id)
            ->where('invitations.accepted','=',1)
            ->whereDate('fairs.start_date', '<=' , $current)
            ->orderBy('fairs.start_date', 'asc');

        if($request->input('search')){
            $searchText = $request->input('search');
            $all_universities->where(function($q) use ($searchText){
                $q->where('universities.name','LIKE', '%' . $searchText . '%')
                    ->orWhere('universities.country','LIKE', '%' . $searchText . '%')
                    ->orWhere('universities.city','LIKE', '%' . $searchText . '%')
                    ->orWhere('universities.users','LIKE', '%' . $searchText . '%')
                    ->orWhere('universities.emails','LIKE', '%' . $searchText . '%')
                    ->orWhere('universities.email','LIKE', '%' . $searchText . '%')
                    ->orWhere('schools.name','LIKE', '%' . $searchText . '%');
            });

        }

        $universities= $all_universities->paginate(5)->appends(Input::except('page'))->onEachSide(1);

        $data['universities'] = $universities;

        return response()->json($data, 200);
    }

    public function getFutureConfirmed(Request $request){
        $university = University::where('id', Auth::user()->university_id)->get()->first();
        $current = Carbon::today();

        $all_universities = University::selectRaw('universities.*,
                fairs.start_date as start_date,
                fairs.end_date as end_date,
                schools.name as school_name,
                schools.logo as school_logo,
                schools.fees_grade11 as fees_11,
                schools.fees_grade12 as fees_12,
                schools.number_grade11 as number_grade11,
                schools.number_grade12 as number_grade12
        
        ')->leftJoin('invitations', function ($join){
            $join->on('universities.id','=','invitations.university_id');
        })->leftJoin('fairs', function ($join){
            $join->on('invitations.fair_id','=', 'fairs.id');
        })->leftJoin('schools', function ($join){
            $join->on('fairs.school_id', '=', 'schools.id');
        })->where('universities.id','=', auth()->user()->university_id)
            ->where('invitations.accepted','=',1)
            ->whereDate('fairs.start_date', '>' , $current)
            ->orderBy('fairs.start_date', 'asc');

        if($request->input('search')){
            $searchText = $request->input('search');
            $all_universities->where(function($q) use ($searchText){
                $q->where('universities.name','LIKE', '%' . $searchText . '%');
            });

        }

        $universities= $all_universities->paginate(5)->appends(Input::except('page'))->onEachSide(1);
        $data['universities'] = $universities;

        return response()->json($data, 200);
    }
}
