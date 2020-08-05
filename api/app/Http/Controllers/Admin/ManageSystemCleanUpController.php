<?php

namespace App\Http\Controllers\Admin;

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
use App\Mail\SchoolFiarupdateMail;
use Illuminate\Support\Facades\Mail;
use Illuminate\Validation\Rules\In;
use DB;

class ManageSystemCleanUpController extends Controller
{
    /**
     * get list of school fairs
     */
    public function fairIndex() {
        $schools = School::get();
        $fairs = Fair::get();
        return view('admin.manage_system_clean_up.fair_clean_up', compact(['fairs','schools']));

    }

    public function fairConfirm(Request $request){
        $fair_id = $request->fair_id;
        $invitation = Invitation::where('fair_id', "=" ,$fair_id)->first();
        if(!empty($invitation->id)){
            $data = true;
        }
        else{
            $data = false;
        }

        return response()->json(['success'=>$data]);
    }

    public function fairView($id){

        $fair = Fair::find($id);
        $schools = School::get();

        $invitations = Invitation::where('fair_id','=',$fair->id)->where('accepted', '=', 1)->get();
        $universities =[];

        foreach ($invitations as $index => $invitation)
        {
            $universities[$index] = University::find($invitation->university_id);

        }

        return view('admin.manage_system_clean_up.fair_clean_up_view', compact(['fair','schools','universities']));

    }

    public function fairDelete($id){
        $fair = Fair::find($id);
        $invitations = Invitation::where('fair_id','=',$fair->id)->get();

        if ($invitations){
            foreach ($invitations as $invitation){
                $invitation->delete();
            }
        }
        $fair->delete();

        return redirect()->route('admin.fair_delete')->with([
            'error' => false,
            'message' => 'Fair deleted successfully !'
        ]);
    }


    public function universityIndex() {

//        $fairs = Fair::where('school_id', Auth::user()->school_id)->get();
//        $school = School::find(Auth::user()->school_id);
        $universities = University::get();

        return view('admin.manage_system_clean_up.university_clean_up', [
            'universities' => $universities
        ]);

    }

    public function universityConfirm(Request $request){
        $university_id= $request->university_id;

        $invitation = Invitation::where('university_id','=',$university_id)->first();

        $user = User::where('university_id','=',$university_id)->first();
        if(!empty($invitation->id) || !empty($user->id)){
            $data = true;
        }
        else{
            $data = false;
        }

        return response()->json(['success'=>$data]);
    }

    public function universityDelete($id){
        $university = University::find($id);

        $invitations = Invitation::where('university_id','=',$university->id)->get();
        if ($invitations){
            foreach ($invitations as $invitation){
                $invitation->delete();
            }
        }

        $users = User::where('university_id', '=', $university->id)->get();

        if($users){
            foreach ($users as $user){
                $user->delete();
            }
        }

        $university->delete();

        return redirect()->route('admin.university_delete')->with([
            'error' => false,
            'message' => 'University deleted successfully!'
        ]);
    }

    public function schoolIndex() {
        $schools = School::get();
        return view('admin.manage_system_clean_up.school_clean_up', compact(['schools']));
    }

    public function schoolDelete($id){
        $school = School::find($id);

        $fairs = Fair::where('school_id', '=', $school->id)->get();
        if($fairs){
            foreach ($fairs as $fair){
                $invitations = Invitation::where('fair_id', '=', $fair->id)->get();

                if($invitations){
                    foreach ($invitations as $invitation){
                        $invitation->delete();
                    }
                }
                $fair->delete();
            }
        }

        $users = User::where('school_id', '=', $school->id)->get();

        if($users){
            foreach($users as $user){
                $user->delete();
            }
        }

        $school->delete();

        return redirect()->route('admin.school_delete')->with([
            'error' => false,
            'message' => 'School deleted successfully!'
        ]);
    }

    public function userIndex() {
        $users = User::get();
        return view('admin.manage_system_clean_up.user_clean_up', compact(['users']));

    }

    public function userDelete($id){
        $user = User::find($id);
        $university = University::find($user->university_id);
        if($university){
            $all_users = User::where('university_id', '=', $university->id)->get();
            if(count($all_users)==1){
                return redirect()->route('admin.user_delete')->with([
                    'error' => true,
                    'message' => $university->name. ' have only '. $user->name . ' as user. So you can not delete this user!'
                ]);
            }
            else{
                $user->delete();
                return redirect()->route('admin.user_delete')->with([
                    'error' => false,
                    'message' => $university->name. ' have other users except '. $user->name . ' So this user deleted successfully!'
                ]);
            }
        }
        $school = School::find($user->school_id);
        if($school){
            $all_users = User::where('school_id', '=', $school->id)->get();
            if(count($all_users)==1){
                return redirect()->route('admin.user_delete')->with([
                    'error' => true,
                    'message' => $school->name. ' have only '. $user->name . ' as user. So you can not delete this user!'
                ]);
            }
            else{
                $user->delete();
                return redirect()->route('admin.user_delete')->with([
                    'error' => false,
                    'message' => $school->name. ' have other users except '. $user->name . ' So this user deleted successfully!'
                ]);
            }
        }
    }


    public function duplicateUserIndex(){

        $duplicate_users = DB::table('users')
            ->select('name','email', DB::raw('COUNT(*) as `count`'))
            ->groupBy('name', 'email')
            ->havingRaw('COUNT(*) > 1')
            ->get();

        return view('admin.manage_system_clean_up.duplicate_users', [
            'users' => $duplicate_users
        ]);

    }

    public function duplicateUniversityIndex() {

       $duplicate_universities = DB::table('universities')
            ->select('name', DB::raw('COUNT(*) as `count`'))
            ->groupBy('name')
            ->havingRaw('COUNT(*) > 1')
            ->get();
        return view('admin.manage_system_clean_up.duplicate_university', [
            'universities' => $duplicate_universities
        ]);
    }

    public function duplicateSchoolIndex() {
        $duplicate_schools = DB::table('schools')
            ->select('name', DB::raw('COUNT(*) as `count`'))
            ->groupBy('name')
            ->havingRaw('COUNT(*) > 1')
            ->get();

        return view('admin.manage_system_clean_up.duplicate_schools', [
            'schools' => $duplicate_schools
        ]);

    }
}
