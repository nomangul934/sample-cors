<?php

namespace App\Http\Controllers\Admin;
use App\Models\Package;
use Illuminate\Support\Facades\DB;
use App\Models\Fair;
use App\Models\University;
use Carbon\Carbon;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Validator;
//added by @Prasad
use App\Models\School;
use App\Models\User;
use App\Mail\SchoolFairUpdateMail;
use Illuminate\Support\Facades\Mail;

use Illuminate\Support\Facades\Input;
use Illuminate\Support\Facades\Hash;

class ManageUniversityController extends Controller
{
    /**
     * get list of school fairs
     */
    public function index(Request $request) {

        // $data = $request->session()->all();
        // var_dump($data);exit;
        // $request->session()->flush();

        $fairs = Fair::where('school_id', Auth::user()->school_id)->get();
        $school = School::find(Auth::user()->school_id);
        $all_universities = University::orderBy('created_at','asc');

        if($request->input('search')){
            $searchText = $request->input('search');
            $all_universities->where(function($q) use ($searchText){
                $q->where('name','LIKE', '%' . $searchText . '%')->orWhere('email','LIKE', '%' . $searchText . '%');
            });

        }
        $universities= $all_universities->paginate(5)->appends(Input::except('page'))->onEachSide(1);


        $query = DB::table('functions')->whereNotNull('university_suspend')->get('university_suspend');
        return view('admin.manage_university.index',[
            'fairs' => $fairs,
            'school' => $school,
            'universities' => $universities,
            'query' => $query
        ]);
    }

    public function pastUniversity(Request $request)
    {
        $current = Carbon::today();

        $all_universities = University::selectRaw('universities.*,
                fairs.start_date as start_date,
                fairs.end_date as end_date,
                schools.name as school_name,
                schools.logo as school_logo
        
        ')->leftJoin('invitations', function ($join){
            $join->on('universities.id','=','invitations.university_id');
        })->leftJoin('fairs', function ($join){
            $join->on('invitations.fair_id','=', 'fairs.id');
        })->leftJoin('schools', function ($join){
            $join->on('fairs.school_id', '=', 'schools.id');
        })->where('invitations.accepted','=',1)
            ->whereDate('fairs.start_date', '<=' , $current)
            ->orderBy('fairs.start_date', 'asc');

        if($request->input('search')){
            $searchText = $request->input('search');
            $all_universities->where(function($q) use ($searchText){
                $q->where('universities.name','LIKE', '%' . $searchText . '%');
            });

        }

        $universities= $all_universities->paginate(5)->appends(Input::except('page'))->onEachSide(1);

        return view('admin.manage_university.past_confirmed_university',[
           'universities' => $universities
        ]);

    }

    public function futureUniversity(Request $request)
    {
        $current = Carbon::today();

        $all_universities = University::selectRaw('universities.*,
                fairs.start_date as start_date,
                fairs.end_date as end_date,
                schools.name as school_name,
                schools.logo as school_logo
        
        ')->leftJoin('invitations', function ($join){
            $join->on('universities.id','=','invitations.university_id');
        })->leftJoin('fairs', function ($join){
            $join->on('invitations.fair_id','=', 'fairs.id');
        })->leftJoin('schools', function ($join){
            $join->on('fairs.school_id', '=', 'schools.id');
        })->where('invitations.accepted','=',1)
            ->whereDate('fairs.start_date', '>' , $current)
            ->orderBy('fairs.start_date', 'asc');

        if($request->input('search')){
            $searchText = $request->input('search');
            $all_universities->where(function($q) use ($searchText){
                $q->where('universities.name','LIKE', '%' . $searchText . '%');
            });

        }

        $universities= $all_universities->paginate(5)->appends(Input::except('page'))->onEachSide(1);

        return view('admin.manage_university.future_confirmed_university',[
            'universities' => $universities
        ]);
    }

    public function edit($id) {
//        $univ = University::where('id',$id)->get();
        $university = University::find($id);
        $user = User::where('university_id', '=', $university->id)->first();
        $packages = Package::all();
        return view('admin.manage_university.edit_university',[
            'university' => $university,
            'packages' => $packages,
            'user' => $user
        ]);
    }
    public function suspend(Request $request,$id)
    {
        $university = University::find($id);
        $university->state = 1;
        $university->save();
        return redirect()->route('admin.manage_university')->with([
            'error' => false,
            'message' => 'University unsuspend successfully!'
        ]);
    }
    public function suspend1(Request $request,$id)
    {
        $university = University::find($id);
        $university->state = 0;
        $university->save();
        return redirect()->route('admin.manage_university')->with([
            'error' => false,
            'message' => 'University suspended successfully!'
        ]);
    }
    public function update(Request $request, $id) {

        $validator = Validator::make($request->all(), [
            'univ_name' => 'required',            
            'phone' => 'required',
            'email' => 'required',
            'website' => 'required',
            'map_link' => 'required',
        ]);

        if ($validator->fails()) {
            return redirect()->route('admin.edit_univ', ['id' => $id])
                ->withErrors($validator)
                ->withInput();
        }

        $univ_name = $request->get('univ_name');
        $phone = $request->get('phone');
        $email = $request->get('email');
        $website = $request->get('website');
        $map_link = $request->get('map_link');

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

        $accredited = $request->input('accredited');

        $school_credit_1 = explode('/',$request->input('school_credit'));
        $school_credit = $school_credit_1[0];

        $school_activity_1 = explode('/',$request->input('school_activity'));
        $school_activity = $school_activity_1[0];

        $email_marketing_1 = explode('/',$request->input('email_marketing'));
        $email_marketing = $email_marketing_1[0];

        $marketing_support_1 = explode('/',$request->input('marketing_support'));
        $marketing_support = $marketing_support_1[0];

        $digital_media_promotion_1 = explode('/',$request->input('digital_media_promotion'));
        $digital_media_promotion = $digital_media_promotion_1[0];

        $digital_media_promotion_weekly_1 = explode('/',$request->input('digital_media_promotion_weekly'));
        $digital_media_promotion_weekly = $digital_media_promotion_weekly_1[0];

        $SMS_marketing_1 = explode('/',$request->input('SMS_marketing'));
        $SMS_marketing = $SMS_marketing_1[0];

        $package = $request->input('package');

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
            $new_user->university_id = $id;
            $new_user->school_id = 0;
            $new_user->password = Hash::make('12345678');
            $new_user->save();
            $real_user_id = $new_user->id;
        }

        $university = University::where('id', $id)
            ->update([
                'package_id'=> $package,
                'name' => $univ_name,
                'email' => $email,
                'phone' => $phone,
                'website' => $website,
                'map_link' => $map_link,
                'compus' => $compus,
                'country' => $country,
                'city' => $city,
                'address' => $address,
                'logo' => $image_name,
                'accredited' => $accredited,
                'school_fairs' => $school_credit,
                'school_activities' => $school_activity,
                'email_marketing' => $email_marketing,
                'marketing_support' => $marketing_support,
                'digital_media_promotion' => $digital_media_promotion,
                'digital_media_promotion_weekly' => $digital_media_promotion_weekly,
                'SMS_marketing' => $SMS_marketing,
                'users' => $manage_user,
                'emails' => $manage_email
            ]);

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
                    $university->package_id = $package;
                    $university->accredited = $accredited;
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

        return redirect()->route('admin.manage_university')->with([
            'error' => false,
            'message' => 'University updated successfully !'
        ]);

        //Updated by @Prasad
        //Send notification to all Universities using mail
        $this->sendNotifyToUniversities($university);
    }
    public function update_packages() {
        $packages = Package::all();
        return view('admin.manage_university.update_packages',[
            'packages' => $packages
        ]);

    }

    public function savePackages(Request $request){
        $packages = Package::all();

        foreach ($packages as $package){
            $id = $package->id;
            if($request->input('listing_' . $id) == true ){
                $listing = 1;
            }
            else{
                $listing = 0;
            }
            if($request->input('enhanced_listing_' . $id) == true ){
                $enhanced_listing = 1;
            }
            else{
                $enhanced_listing = 0;
            }
            if($request->input('lead_generation_' . $id) == true ){
                $lead_generation = 1;
            }
            else{
                $lead_generation = 0;
            }

            $package->listing = $listing;
            $package->enhanced_listing = $enhanced_listing;
            $package->lead_generation = $lead_generation;
            $package->school_fairs = $request->input('school_fairs_' . $id);
            $package->school_activities = $request->input('school_activities_' . $id);
            $package->email_marketing =$request->input('email_marketing_' . $id);
            $package->marketing_support = $request->input('marketing_support_' . $id);
            $package->digital_media_promotion = $request->input('digital_media_promotion_' . $id);
            $package->digital_media_promotion_weekly = $request->input('digital_media_promotion_weekly_' . $id);
            $package->SMS_marketing = $request->input('SMS_marketing_' . $id);
            $package->save();
        }


        return redirect()->route('admin.update_packages')->with([
            'error' => false,
            'message' => 'Packages updated successfully!'
        ]);

    }


    public function edit_counselor() {

        // $fairs = Fair::where('school_id', Auth::user()->school_id)->get();
        // $school = School::find(Auth::user()->school_id);
        // $universities = University::get();
        // $query = DB::table('functions')->whereNotNull('university_suspend')->get('university_suspend');
        // var_dump("test");exit();
        return view('admin.manage_university.edit_counselor');

    }

    public function getPackage(Request $request){
        $package_id = $request->input('package_id');
        $university_id = $request->input('university_id');

        $package = Package::find($package_id);
        $university = University::find($university_id);

        return response()->json(['package'=> $package, 'university'=> $university],200);

    }
    public function userSuspend($id){
        $user = User::find($id);

        $user->state = 0;
        $user->save();

        return redirect()->route('admin.edit_univ' ,['id'=>$user->university_id])->with([
            'error' => false,
            'message' => 'User suspended successfully!'
        ]);
    }

    public function userUnsuspend($id)
    {
        $user = User::find($id);

        $user->state = 1;
        $user->save();

        return redirect()->route('admin.edit_univ' ,['id'=>$user->university_id])->with([
            'error' => false,
            'message' => 'User unsuspended successfully!'
        ]);
    }
   
    
}
