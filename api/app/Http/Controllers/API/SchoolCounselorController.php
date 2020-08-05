<?php

namespace App\Http\Controllers\API;

use Illuminate\Support\Facades\DB;
use App\Models\Fair;
use App\Models\University;
use App\Models\Counselor;
use Carbon\Carbon;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;
//added by @Prasad
use App\Models\School;
use App\Models\User;
use App\Mail\SchoolFiarupdateMail;
use Illuminate\Support\Facades\Mail;

class SchoolCounselorController extends Controller
{
    public function get_counselors(){
        $counselor = Counselor::where('school_id',Auth::user()->school_id)->get();
        $school = School::where('id', Auth::user()->school_id)->get()->first();
        $fairs = Fair::where('school_id', Auth::user()->school_id)->get();

        $data['counselor'] = $counselor;
        $data['school'] = $school;
        $data['fairs'] = $fairs;
        return response()->json($data, 200);
    }
    public function update(Request $request) {
        $id = $request->input('school_id');

        $full_name = json_encode($request->get('full_name'));
        $mobile = json_encode($request->get('mobile'));
        $email = json_encode($request->get('email'));

        $names = $request->input('full_name');
        $mobiles = $request->input('mobile');
        $emails = $request->input('email');

        $counselor = Counselor::where('school_id',$id)->get();

        if(sizeof($counselor)){
            Counselor::where('school_id', $id)
                ->update([
                    'full_name' => $full_name,
                    'mobile' => $mobile,
                    'email' => $email,
                    'school_id' => $id,
                ]);
        }else{
            Counselor::create([
                'full_name' => $full_name,
                'mobile' => $mobile,
                'email' => $email,
                'school_id' => $id,

            ]);
        }

        foreach ($names as $index => $name){
            $check_user = User::where('email', '=' ,$emails[$index])->first();
            if($check_user){
                $user = $check_user;
                $user->password = $check_user->password;
            }
            else{
                $user = new User();
                $user->password = Hash::make('12345678');
            }
            $user->name = $name;
            $user->school_id = $id;
            $user->mobile = $mobiles[$index];
            $user->email = $emails[$index];
            $user->role = 'school';

            $user->save();
        }

        $counselor = Counselor::where('school_id',Auth::user()->school_id)->get();
        $school = School::where('id', Auth::user()->school_id)->get()->first();
        $fairs = Fair::where('school_id', Auth::user()->school_id)->get();

        $data['counselor'] = $counselor;
        $data['school'] = $school;
        $data['fairs'] = $fairs;
        return response()->json($data, 200);

    }
}
