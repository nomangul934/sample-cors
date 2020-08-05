<?php

namespace App\Http\Controllers\API;

use App\Models\Fair;
use App\Models\University;
use Carbon\Carbon;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
//added by @Prasad
use App\Models\School;
use App\Models\User;
use App\Mail\SchoolFiarupdateMail;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Facades\Input;
use Validator;
use DB;

class UserController extends Controller
{
    public function getUsers(Request $request){
        $all_users = User::orderBy('created_at','asc');

        if($request->input('search')){
            $searchText = $request->input('search');
            $all_users->where(function($q) use ($searchText){
                $q->where('name','LIKE', '%' . $searchText . '%')->orWhere('email','LIKE', '%' . $searchText . '%');
            });

        }
        $users= $all_users->paginate(5)->appends(Input::except('page'))->onEachSide(1);
        $data['users'] = $users;
        return response()->json($data, 200);
    }

    public function addUser(){
        $user = new User();
        $universities = University::all();
        $schools = School::all();
        $data['user'] = $user;
        $data['universities'] = $universities;
        $data['schools'] = $schools;
        return response()->json($data, 200);
    }

    public function saveUser(Request $request){
        $user = new User();

        $user->name = $request->input('name');
        $user->mobile = $request->input('mobile');
        $user_data = $request->input('user_data');
        $user->email = $request->input('email');
        $user->ext = $request->input('ext');
        $user->title = $request->input('title');
        $user->phone = $request->input('phone');

        if($request->input('password')){
            $user->password = Hash::make($request->input('password'));
        }
        $check_uni = $request->input('school_type');
        $school_name = $request->input('school_name');

        if($check_uni=='University'){
            $university_id = DB::table('universities')->where('name', $school_name)->get()[0]->id;
            $user->university_id = $university_id;
            $user->school_id =0 ;
            $user->role = 'university';
        }
        else{
            $user->university_id = 0;
            $school_id = DB::table('schools')->where('name', $school_name)->get()[0]->id;
            $user->school_id = $school_id;
            $user->role = 'school';
        }

        if ($request->hasFile('avatar')) {
            // Get image file
            $image = $request->file('avatar');
            // Make a image name based on user name and current timestamp
            $name = str_slug($request->input('name')).'_'.time().'.'.$image->getClientOriginalExtension();
            // Define folder path
            $image->move(public_path() . '/images/user/', $name);

            $user->logo = $name;
        } else if(!$request->input('id')){
            $user->logo = 'user.png';
        }

        $user->save();

        $universities = University::all();
        $schools = School::all();
        $data['user'] = $user;
        $data['universities'] = $universities;
        $data['schools'] = $schools;
        return response()->json($data, 200);
    }

    public function getUser(Request $request){
        $user_id = $request->input('user_id');
        $user = User::find($user_id);

        $universities = University::all();
        $schools = School::all();
        $data['user'] = $user;
        $data['universities'] = $universities;
        $data['schools'] = $schools;
        return response()->json($data, 200);
    }

    public function suspendUser(Request $request){
        $user = User::find($request->input('user_id'));
        $user->state = ($user->state + 1) % 2;
        $user->save();
        return response()->json(['state' => $user->state], 200);
    }

    public function updateUserSchoolType(Request $request){
        $school_type = $request->input('type');
        $id = $request->input('user_id');
        $user = User::find($id);
        if($school_type == 'University'){
            $user->school_id =0 ;
            $user->role = 'university';
            $user->university_id = DB::table('universities')->first()->id;
        }
        else{
            $user->school_id = DB::table('schools')->first()->id ;
            $user->university_id = 0;
            $user->role = 'school';
        }
        $user->save();

        $universities = University::all();
        $schools = School::all();
        $data['user'] = $user;
        $data['universities'] = $universities;
        $data['schools'] = $schools;
        return response()->json($data, 200);
    }

    public function updateUser(Request $request){
        //$user_data = $request->input('user_data');
        $id = $request->input('user_id');
        $user = User::find($id);

        $user->name = $request->input('name');
        $user->mobile = $request->input('mobile');
        $user->email = $request->input('email');
        $user->ext = $request->input('ext');
        $user->title = $request->input('title');
        $user->phone = $request->input('phone');
        $check_uni = $request->input('school_type');
        $school_name = $request->input('school_name');
        if($check_uni=='University'){
            $university_id = DB::table('universities')->where('name', $school_name)->get()[0]->id;
            $user->university_id = $university_id;
            $user->school_id =0 ;
            $user->role = 'university';
        }
        else{
            $user->university_id = 0;
            $school_id = DB::table('schools')->where('name', $school_name)->get()[0]->id;
            $user->school_id = $school_id;
            $user->role = 'school';
        }
        $image = $request->input('user_logo');

        if($image){
            $user->logo = $image;
        }
        else{
            if ($request->has('avatar')) {
                // Get image file
                $image = $request->file('avatar');
                // Make a image name based on user name and current timestamp
                $name = str_slug($request->input('name')).'_'.time().'.'.$image->getClientOriginalExtension();
                // Define folder path
                $image->move(public_path() . '/images/user/', $name);

                $user->logo = $name;
            } else if(!$request->input('id')){
                $user->logo = 'user.png';
            }
        }

        $user->save();

        $universities = University::all();
        $schools = School::all();
        $data['user'] = $user;
        $data['universities'] = $universities;
        $data['schools'] = $schools;
        return response()->json($data, 200);
    }

    public function getDeleteUsers(){
        $users = DB::table('users')
            ->select('id', 'name', 'role', 'phone', 'email')
            ->get();
        return response()->json($users, 200);
    }

    public function userDelete(Request $request){
        $user = User::find($request->input('user_id'));
        $university = University::find($user->university_id);

        if($university){
            $all_users = User::where('university_id', '=', $university->id)->get();
            if(count($all_users)==1){

            }
            else{
                $user->delete();
            }
        }
        $school = School::find($user->school_id);
        if($school){
            $all_users = User::where('school_id', '=', $school->id)->get();
            if(count($all_users)==1){

            }
            else{
                $user->delete();
            }
        }
        $users = DB::table('users')
            ->select('id', 'name', 'role', 'phone', 'email')
            ->get();
        return response()->json($users, 200);
    }

    public function getDuplicateUsers(){
        $duplicate_users = DB::table('users')
            ->select('name','email', DB::raw('COUNT(*) as `count`'))
            ->groupBy('name', 'email')
            ->havingRaw('COUNT(*) > 1')
            ->get();
        $data['users'] = $duplicate_users;
        return response()->json($data, 200);
    }
}
