<?php

namespace App\Http\Controllers\University;

use App\Models\Curriculum;
use App\Models\School;
use App\Models\University;
use App\Models\User;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;
use Illuminate\Validation\Rule;

class ProfileController extends Controller
{
    public function update () {

        $university = University::find(Auth::user()->university_id);    
        $university_user = Auth::user();

        $univ = University::where('id',Auth::user()->university_id)->get();

        return view('university.profile', compact(['university', 'univ','university_user']));
    }

    public function edit(Request $request) {

        $university_user = Auth::user();

        $validator = Validator::make($request->all(), [
            'univ_name' => 'required',            
            'phone' => 'required',
            'email' => 'required',
            'website' => 'required',
            'map_link' => 'required',
        ]);

        if ($validator->fails()) {
            return redirect()->route('university.update_profile')
                ->withErrors($validator)
                ->withInput();
        }

        $university_logo = $request->input('university_logo');
        if($university_logo){
            $image_name = $university_logo;
        }
        else{
            if ($request->has('avatar')) {
                // Get image file
                $image = $request->file('avatar');


                // Make a image name based on user name and current timestamp
                $name = str_slug($request->input('name')).'_'.time() . $image->getClientOriginalName();
                // Define folder path
                $image->move(public_path() . '/images/university/', $name);

                $image_name = $name;
            } else if(!$request->input('id')){
                $image_name = 'university.png';
            }
        }
        $univ_name = $request->get('univ_name');
        $phone = $request->get('phone');
        $email = $request->get('email');
        $website = $request->get('website');
        $map_link = $request->get('map_link');

        $university_id = $request->input('university_id');

        $user_id = $request->input('user_id');

        $compuses = $request->get('compus');
        $countries = $request->get('country');
        $cities = $request->get('city');
        $address_1 = $request->get('address');
        $manage_users = $request->input('users');
        $manage_emails = $request->input('emails');


        $compus = json_encode($request->get('compus'));
        $country = json_encode($request->get('country'));
        $city = json_encode($request->get('city'));
        $address = json_encode($request->get('address'));
        $manage_user =  json_encode($request->get('users'));
        $manage_email = json_encode($request->get('emails'));

        if($user_id && $user_id != 0 ){
            $real_user_id = $user_id;
        }
        else{
            $new_user = new User();
            $new_user->name = $manage_users[0];
            $new_user->email = $manage_emails[0];
            $new_user->role = 'university';
            $new_user->university_id = $university_id;
            $new_user->school_id = 0;
            $new_user->password = Hash::make('12345678');
            $new_user->save();
            $real_user_id = $new_user->id;
        }

        $university = University::find($university_id);
        $university->name = $univ_name;
        $university->email = $email;
        $university->phone = $phone;
        $university->website = $website;
        $university->map_link = $map_link;
        $university->compus = $compus;
        $university->country = $country;
        $university->city = $city;
        $university->address = $address;
        $university->logo = $image_name;
        $university->users = $manage_user;
        $university->emails = $manage_email;

        $university->save();


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
                $address_arr[0] = $address_1[$index];
                $manage_user_arr[0] = $manage_users[$index];
                $manage_email_arr[0] = $manage_emails[$index];

                $compus_json = json_encode($compus_arr);
                $country_json = json_encode($country_arr);
                $city_json = json_encode($city_arr);
                $address_json = json_encode($address_arr);
                $manage_user_json = json_encode($manage_user_arr);
                $manage_email_json = json_encode($manage_email_arr);
                if($index >0){
                    $user_university = University::where('name', '=', $univ_name . '-' . $compus)->first();
                    if($user_university){
                        $university = University::find($user_university->id);
                        $user = User::where('university_id', '=', $university->id)->first();
                    }
                    else{
                        $university = new University();
                        $user = new User();
                    }

                    $university->name = $univ_name . '-' . $compus;
                    $university->email = $email;
                    $university->compus = $compus_json;
                    $university->country = $country_json;
                    $university->city = $city_json;
                    $university->address = $address_json;
                    $university->logo = $image_name;
                    $university->users = $manage_user_json;
                    $university->emails = $manage_email_json;

                    $university->save();

                    $user->name = $manage_users[$index];
                    $user->university_id = $university->id;
                    $user->role = 'university';
                    $user->school_id = 0;
                    $user->email = $manage_emails[$index];
                    $user->password = Hash::make('12345678');
                    $user->save();

                }
            }
        }

        return redirect()->route('university.update_profile')->with([
            'error' => false,
            'message' => 'Profile updated successfully !'
        ]);

        // return back()->with(['message' => 'Profile updated successfully !']);

    }
    public function userProfile(){
        $user = Auth::user();
        $universities = University::all();
        $schools = School::all();

        return view('university.user_profile', [
            'schools' => $schools,
            'user' => $user,
            'universities' => $universities
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

        $user->university_id = $request->input('university_id');
        $user->school_id =0 ;

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


        return redirect()->route('university.user_profile')->with([
            'error' => false,
            'message' => 'Your profile updated successfully!'
        ]);
    }
}
