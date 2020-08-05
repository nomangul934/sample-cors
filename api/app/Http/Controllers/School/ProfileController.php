<?php

namespace App\Http\Controllers\School;

use App\Models\Curriculum;
use App\Models\School;
use App\Models\University;
use App\Models\User;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\Input;
use Illuminate\Validation\Rule;
use Illuminate\Support\Facades\Hash;

class ProfileController extends Controller
{
    public function update () {

        $school = School::find(Auth::user()->school_id);    
        $schooluser = Auth::user();           
        $curricula = Curriculum::all();

        return view('school.profile', [
            'school' => $school,
            'schooluser' => $schooluser,
            'curricula' => $curricula
        ]);
    }

    public function edit(Request $request) {
        $request->flash();
        $validator = Validator::make($request->all(), [
            'school_name' => ['bail', 'required', 'max:255'],
            'phone' => ['bail', 'required'],
            'email' => ['bail', 'nullable', 'string', 'email', 'max:255'],
            'website'=>['bail', 'required', 'string', 'max:255'],
            'fees_grade11' => ['bail', 'required', 'integer'],
            'fees_grade12' => ['bail', 'required', 'integer']
        ]);

        if ($validator->fails()) {
            return redirect()->route('school.update_profile')
                ->withErrors($validator)
                ->withInput();
        }

        $user = Auth::user();
        $school_logo = $request->input('school_logo');
        if($school_logo){
            $image_name = $school_logo;
        }
        else{
            if ($request->has('avatar')) {
                // Get image file
                $image = $request->file('avatar');

                // Make a image name based on user name and current timestamp
                $name = str_slug($request->input('name')).'_'.time() . $image->getClientOriginalName();
                // Define folder path
                $image->move(public_path() . '/images/school/', $name);

                $image_name = $name;
            } else if(!$request->input('id')){
                $image_name = 'school.png';
            }
        }
        $school_name = $request->get('school_name');
        $phone = $request->get('phone');
        $email = $request->get('email');
        $website = $request->get('website');
        $map_link = $request->get('map_link');

        $compuses = $request->get('compus');
        $countries = $request->get('country');
        $cities = $request->get('city');
        $address = $request->get('address');
        $manage_users = $request->input('users');
        $manage_emails = $request->input('emails');


        $compus = json_encode($request->get('compus'));
        $country = json_encode($request->get('country'));
        $city = json_encode($request->get('city'));
        $address_1 = json_encode($request->get('address'));
        $manage_user =  json_encode($request->get('users'));
        $manage_email = json_encode($request->get('emails'));


        $school = School::find($user->school_id);
        $school->name = $request->get('school_name');
        $school->email = $request->get('email');
        $school->phone = $request->get('phone');
        $school->website = $request->get('website');
        $school->address1 = $address_1;

        $school->country = $country;
        $school->city = $city;
        $school->latitude = $request->get('latitude');
        $school->longitude = $request->get('longitude');
        $school->about_us = $request->get('about_us');
        $school->full_profile = $request->get('full_profile');
        $school->logo = $image_name;
        $school->curriculum_id = $request->get('curriculum');
        $school->number_grade11 = $request->get('number_grade11');
        $school->number_grade12 = $request->get('number_grade12');
        $school->fees_grade11 = $request->get('fees_grade11');
        $school->fees_grade12 = $request->get('fees_grade12');
        $school->map_link = $request->get('map_link');
        $school->compus = $compus;
        $school->users = $manage_user;
        $school->emails = $manage_email;


        $school->save();


        if(count($compuses)>1){
            foreach ($compuses as $index => $compus){
                $compus_arr =[];
                $country_arr = [];
                $city_arr = [];
                $address_arr = [];
                $manage_user_arr = [];
                $manage_email_arr = [];

                $compus_arr[0] = $compus;
                $country_arr[0] = $countries[$index];
                $city_arr[0] = $cities[$index];
                $address_arr[0] = $address[$index];
                $manage_user_arr[0] = $manage_users[$index];
                $manage_email_arr[0] = $manage_emails[$index];

                $compus_json = json_encode($compus_arr);
                $country_json = json_encode($country_arr);
                $city_json = json_encode($city_arr);
                $address_json = json_encode($address_arr);
                $manage_user_json = json_encode($manage_user_arr);
                $manage_email_json = json_encode($manage_email_arr);

                if($index >0){
                    $user_school = School::where('name', '=', $school_name . '-' . $compus)->first();
                    if($user_school){
                        $school = School::find($user_school->id);
                        $user = User::where('school_id', '=', $school->id)->first();
                    }
                    else{
                        $school = new School();
                        $user = new User();
                    }

                    $school->name = $school_name . '-' . $compus;
                    $school->email = $email;
                    $school->website = $website;
                    $school->map_link = $map_link;
                    $school->compus = $compus_json;
                    $school->country = $country_json;
                    $school->city = $city_json;
                    $school->address1 = $address_json;
                    $school->logo = $image_name;
                    $school->users = $manage_user_json;
                    $school->emails = $manage_email_json;

                    $school->save();

                    $user->name = $manage_users[$index];

                    $user->school_id = $school->id;
                    $user->role = 'school';
                    $user->email = $manage_emails[$index];
                    $user->password = Hash::make('12345678');
                    $user->save();

                }
            }
        }

        return redirect()->route('school.update_profile')->with([
            'error' => false,
            'message' => 'School profile updated successfully!'
        ]);
    }
    public function userProfile(){
        $user = Auth::user();
        $school = School::find($user->school_id);
        $universities = University::all();
        $schools = School::all();

//        dd($school->name);

        return view('school.user_profile', [
            'schools' => $schools,
            'user' => $user,
            'universities' => $universities,
            'school' => $school
        ]);
    }
    public function userUpdate(Request $request, $id){
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

        return redirect()->route('school.user_profile')->with([
            'error' => false,
            'message' => 'Your profile updated successfully!'
        ]);
    }
}
