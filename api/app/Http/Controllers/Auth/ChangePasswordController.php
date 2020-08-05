<?php

namespace App\Http\Controllers\Auth;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;

class ChangePasswordController extends Controller
{
    public function showChangePasswordForm() {
        return view('auth.change_password');
    }
    
    // public function change_pwd_page() {
    //     return view('auth.change_password');
    // }

    public function change_pwd(Request $request) {

        if (!(Hash::check($request->get('current-password'), Auth::user()->password))) {
            // The passwords matches
            return redirect()->back()->with("error","Your current password does not matches with the password you provided. Please try again.");
        }
        if(strcmp($request->get('current-password'), $request->get('password')) == 0){
            //Current password and new password are same
            return redirect()->back()->with("error","New Password cannot be same as your current password. Please choose a different password.");
        }


        $validator = Validator::make($request->all(), [
            'current-password' => ['required'],
            'password' => ['bail', 'required', 'string', 'min:8', 'confirmed'],
        ]);

        if ($validator->fails()) {
            return redirect()->route('change_password')
                ->withErrors($validator)
                ->withInput();
        }

        //Change Password
        
        $user = Auth::user();
        $user->password = bcrypt($request->get('password'));
        $user->save();
        $roles = $user->role;
        // var_dump($roles);exit();
        if($roles == 'admin'){
            $redirect = 'admin.manage_university';
        }else{
            $redirect = $user->role === 'school' ? 'school.fairs_list' :
            ($user->role === 'university' ? 'university.invitations_list' : '');
        }
       
        return redirect()->route($redirect)->with([
            'error' => false,
            'message' => 'Password changed successfully !'
        ]);
    }
}
