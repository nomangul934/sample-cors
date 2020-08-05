<?php

namespace App\Http\Controllers\Admin;

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

class ManageUsersController extends Controller
{
    /**
     * get list of school fairs
     */
    public function index(Request $request) {

        $all_users = User::orderBy('created_at','asc');

        if($request->input('search')){
            $searchText = $request->input('search');
            $all_users->where(function($q) use ($searchText){
                $q->where('name','LIKE', '%' . $searchText . '%')->orWhere('email','LIKE', '%' . $searchText . '%');
            });

        }
        $users= $all_users->paginate(5)->appends(Input::except('page'))->onEachSide(1);

        return view('admin.manage_users.index', [
            'users' => $users
        ]);

    }

    public function suspend($id){

        $user = User::find($id);

        $user->state = 0;
        $user->save();

        return redirect('admin/manage_users');
    }
    public function unSuspend($id){
        $user = User::find($id);

        $user->state = 1;
        $user->save();

        return redirect('admin/manage_users');
    }

    public function add() {

        $user = new User();
        $universities = University::all();
        $schools = School::all();
        return view('admin.manage_users.add_user', [
            'user' => $user,
            'universities' => $universities,
            'schools' => $schools
        ]);

    }

    public function schoolCompus(Request $request){
        $school_id = $request->input('school_id');
        $school = School::find($school_id);
        $all_compuses = $school->compus;

        $compuses = json_decode($all_compuses);

        return response()->json(['compuses'=> $compuses],200);

    }
    public function universityCompus(Request $request){
        $university_id = $request->input('university_id');
        $university = University::find($university_id);
        $all_compuses = $university->compus;

        $compuses = json_decode($all_compuses);

        return response()->json(['compuses'=> $compuses],200);

    }

    public function edit($id){
        $user = User::find($id);

        $universities = University::all();
        $schools = School::all();
        return view('admin.manage_users.edit_user', [
            'user' => $user,
            'universities' => $universities,
            'schools' => $schools
        ]);
    }

    public function saveUser(Request $request){
        $request->flash();
        $validator = Validator::make($request->all(), [
            'name' => 'required|max:190',
            'mobile' => 'required|max:190',
            'email' => 'required|email',
            'ext' => 'required|max:190',
            'title'=> 'required|max:190',
            'password' => 'max:190|confirmed',

        ]);
        $validator->setAttributeNames([
            'name' => 'Name',
            'mobile' => 'Mobile Number',
            'email' => 'Email',
            'ext' => 'Ext',
            'title' => 'Title',
            'password' => 'Password',
            'password_confirmation' => 'Password Confirmation',
        ]);
        if ($validator->fails()) {
            return back()->with('errors', $validator->errors());
        }
        $user = new User();

        $user->name = $request->input('name');
        $user->mobile = $request->input('mobile');
        $user->email = $request->input('email');
        $user->ext = $request->input('ext');
        $user->title = $request->input('title');
        $user->phone = $request->input('phone');

        if($request->input('password')){
            $user->password = Hash::make($request->input('password'));
        }
        $check_uni = $request->input('uni_school_check');
        if($check_uni==1){
            $user->university_id = $request->input('university_id');
            $user->school_id =0 ;
            $user->role = 'university';
        }
        else{
            $user->university_id = 0;
            $user->school_id = $request->input('school_id');
            $user->role = 'school';
        }

        if ($request->has('avatar')) {
            // Get image file
            $image = $request->file('avatar');
            // Make a image name based on user name and current timestamp
            $name = str_slug($request->input('name')).'_'.time() . $image->getClientOriginalName();
            // Define folder path
            $image->move(public_path() . '/images/user/', $name);

            $user->logo = $name;
        } else if(!$request->input('id')){
            $user->logo = 'user.png';
        }
        $compus = $request->input('compus');
//        if(isset($compus) && $compus){
//            $user->compus = json_encode($compus);
//        }

        $user->save();

        return redirect()->route('admin.manage_users')->with([
            'error' => false,
            'message' => 'User added successfully!'
        ]);


    }

    public function updateUser(Request $request, $id){
        $request->flash();
        $validator = Validator::make($request->all(), [
            'name' => 'required|max:190',
            'mobile' => 'required|max:190',
            'email' => 'required|email',
            'ext' => 'max:190',
            'title'=> 'max:190',

        ]);
        $validator->setAttributeNames([
            'name' => 'Name',
            'mobile' => 'Mobile Number',
            'email' => 'Email',
            'ext' => 'Ext',
            'title' => 'Title',
        ]);
        if ($validator->fails()) {
            return back()->with('errors', $validator->errors());
        }
        $user = User::find($id);

        $user->name = $request->input('name');
        $user->mobile = $request->input('mobile');
        $user->email = $request->input('email');
        $user->ext = $request->input('ext');
        $user->title = $request->input('title');
        $user->phone = $request->input('phone');

        if($request->input('password')){
            $user->password = Hash::make($request->input('password'));
        }
        $check_uni = $request->input('uni_school_check');
        if($check_uni==1){
            $user->university_id = $request->input('university_id');
            $user->school_id =0 ;
            $user->role = 'university';
        }
        else{
            $user->university_id = 0;
            $user->school_id = $request->input('school_id');
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
                $name = str_slug($request->input('name')).'_'.time() . $image->getClientOriginalName();
                // Define folder path
                $image->move(public_path() . '/images/user/', $name);

                $user->logo = $name;
            } else if(!$request->input('id')){
                $user->logo = 'user.png';
            }
        }


        $compus = $request->input('compus');
//        if(isset($compus) && $compus){
//            $user->compus = json_encode($compus);
//        }

        $user->save();

        return redirect()->route('admin.manage_users')->with([
            'error' => false,
            'message' => 'User updated successfully!'
        ]);
    }

    
}
