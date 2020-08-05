<?php

namespace App\Http\Controllers\University;
use Illuminate\Support\Facades\Auth;
use App\Models\School;
use App\Models\University;
use App\Models\User;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Validator;
use Illuminate\Validation\Rule;
use Illuminate\Support\Facades\Hash;

class UsersController extends Controller
{
    /**
     * List of all system schools
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function index() { 

        $university_user = Auth::user();
        $university = University::find(Auth::user()->university_id);
    
        $users = User::where('university_id', Auth::user()->university_id)->get();

        return view('university.user.index', compact(['users','university_user','university']));
    
    }

    /**
     * Show a school details
     * @param $id
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function add(Request $request) {
        
        $validator = Validator::make($request->all(), [
            'user_name' => 'required',            
            'mobile' => 'required',
            'email' => 'required',           
            'phone' => 'required',            
            'ext' => 'required',
            'title' => 'required',
        ]);

        if ($validator->fails()) {
            return redirect()->route('university.users_list')
                ->withErrors($validator)
                ->withInput();
        }

        $user_name = $request->get('user_name');
        $phone = $request->get('phone');
        $mobile = $request->get('mobile');
        $email = $request->get('email');
        $ext = $request->get('ext');
        $title = $request->get('title');

        User::create([
            'name' => $user_name,
            'email' => $email,
            'mobile' => $mobile,
            'phone' => $phone,
            'ext' => $ext,
            'title' => $title,
            'university_id'=> Auth::user()->university_id,
            'password' => Hash::make('12345678'),
            'role' => 'university',
            
        ]);
        
        return redirect()->route('university.users_list')->with([
            'error' => false,
            'message' => 'User created successfully !'
        ]);
    }
}












