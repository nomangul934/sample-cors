<?php

namespace App\Http\Controllers\API;

use Illuminate\Support\Facades\Auth;
use App\Models\School;
use App\Models\University;
use App\Models\User;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Validator;
use Illuminate\Validation\Rule;
use Illuminate\Support\Facades\Hash;

class UniversityUserController extends Controller
{
    public function getUsers(){

        $university_user = Auth::user();
        $university = University::find(Auth::user()->university_id);
        $users = User::where('university_id', Auth::user()->university_id)->get();

        $data['users'] = $users;
        $data['university'] = $university;
        return response()->json($data, 200);
    }
    public function add(Request $request) {

        $user_data = $request->input('user_data');

        $user_name = $user_data['user_name'];
        $phone = $user_data['phone'];
        $mobile = $user_data['mobile'];
        $email = $user_data['email'];
        $ext = $user_data['ext'];
        $title = $user_data['title'];

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

        $university_user = Auth::user();
        $university = University::find(Auth::user()->university_id);

        $users = User::where('university_id', Auth::user()->university_id)->get();

        $data['users'] = $users;
        $data['university'] = $university;
        return response()->json($data, 200);
    }
}
