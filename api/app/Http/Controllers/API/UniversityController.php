<?php

namespace App\Http\Controllers\API;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\Package;
use Illuminate\Support\Facades\DB;
use App\Models\Fair;
use App\Models\University;
use Carbon\Carbon;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Validator;
//added by @Prasad
use App\Models\School;
use App\Models\User;
use App\Mail\SchoolFairUpdateMail;
use Illuminate\Support\Facades\Mail;

use Illuminate\Support\Facades\Input;
use Illuminate\Support\Facades\Hash;
use App\Models\Invitation;

class UniversityController extends Controller
{
    public function getUniversities(Request $request){

        $school_id = $request->input('school_id');
        $fairs = Fair::where('school_id', $school_id)->get();
        $school = School::find($school_id);



        if($request->input('search')){
            $searchText = $request->input('search');

            $all_universities = DB::table('universities')
                ->where('name','LIKE', '%' . $searchText . '%')
                ->orWhere('email','LIKE', '%' . $searchText . '%')
                ->orderBy('created_at','asc');
        }
        else{
            $all_universities = University::orderBy('created_at','asc');
        }
        $universities= $all_universities->paginate(5)->appends(Input::except('page'))->onEachSide(1);

        $query = DB::table('functions')->whereNotNull('university_suspend')->get('university_suspend');
        $data['fairs'] = $fairs;
        $data['school'] = $school;
        $data['universities'] = $universities;
        $data['query'] = $query;
        return response()->json($data, 200);
    }

    public function getUniversity(Request $request){
        $university_id = $request->input('university_id');
        $university = University::find($university_id);
        $user = User::where('university_id', '=', $university->id)->first();
        $packages = Package::all();
        $data['university'] = $university;
        $data['packages'] = $packages;
        $data['user'] = $user;
        $data['updated'] = false;
        return response()->json($data, 200);
    }

    public function suspendUniversity(Request $request){
        $university_id = $request->input("university_id");
        //$current_page = $request->input('current_page');
        $university = University::find($university_id);
        $university->state = ($university->state + 1) % 2;
        $university->save();

        return response()->json(['state' => $university->state], 200);
    }

    public function suspendUser(Request $request){
        $user = User::find($request->input('user_id'));
        $user->state = ($user->state + 1) % 2;
        $user->save();
        return response()->json(['state' => $user->state], 200);
    }


    public function universityDelete(Request $request){
        $university = University::find($request->input('university_id'));
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
        $delete_universities = DB::select( DB::raw("SELECT id, name, users, email, phone,
                city, 'YES' as acc FROM universities"));
        return response()->json($delete_universities, 200);

    }

    public function updateUniversity(Request $request){
        //$university_data = $request->input('university_data');
        $id = $request->input("university_id");

        $univ_name = $request->input('univ_name');
        $phone = $request->input('phone');
        $email = $request->input('email');
        $website = $request->input('website');
        $map_link = $request->input('map_link');

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

        $accredited = (int)$request->input('accredited');

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

        $SMS_marketing_1 = explode('/',$request->input('sms_marketing'));
        $SMS_marketing = $SMS_marketing_1[0];

        $package = $request->input('package');

        $user_id = $request->input('user_id');

        $compuses = json_encode($request->input('compus'));
        $countries = json_encode($request->input('country'));
        $cities = json_encode($request->input('city'));
        $address_1 = json_encode($request->input('address'));
        $manage_users = json_encode($request->input('users'));
        $manage_emails = json_encode($request->input('emails'));


        $compus = $request->input('compus');
        $country = $request->input('country');
        $city = $request->input('city');
        $address = $request->input('address');
        $manage_user =  $request->input('users');
        $manage_email = $request->input('emails');

        if($user_id && $user_id != 0 ){
            $real_user_id = $user_id;
        }
        else{
            $new_user = new User();
            $new_user->name = $manage_users;
            $new_user->email = $manage_emails;
            $new_user->role = 'university';
            $new_user->university_id = $id;
            $new_user->school_id = 0;
            $new_user->password = Hash::make('12345678');
            $new_user->save();
            $real_user_id = $new_user->id;
        }

        $package_id = DB::table('packages')
            ->where('package_name', '=', $package)
            ->get()[0]->id;
        DB::table('universities')->where('id', $id)->update([
                'package_id'=> $package_id,
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

        $university = University::find($id);
        $user = User::where('university_id', '=', $university->id)->first();
        $packages = Package::all();
        $data['university'] = $university;
        $data['packages'] = $packages;
        $data['user'] = $user;
        $data['updated'] = true;
        return response()->json($data, 200);

        //Updated by @Prasad
        //Send notification to all Universities using mail
        $this->sendNotifyToUniversities($university);
    }

    public function getPastConfirms(Request $request){
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
                $q->where('universities.name','LIKE', '%' . $searchText . '%')
                ->orWhere('universities.country','LIKE', '%' . $searchText . '%')
                ->orWhere('universities.city','LIKE', '%' . $searchText . '%')
                ->orWhere('universities.users','LIKE', '%' . $searchText . '%')
                ->orWhere('universities.emails','LIKE', '%' . $searchText . '%')
                ->orWhere('universities.email','LIKE', '%' . $searchText . '%')
                ->orWhere('schools.name','LIKE', '%' . $searchText . '%');
            });

        }

        $universities= $all_universities->paginate(5)->appends(Input::except('page'))->onEachSide(1);
        $data['universities'] = $universities;

        return response()->json($data, 200);
    }

    public function getFutureConfirms(Request $request){
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

        $data['universities'] = $universities;
        return response()->json($data, 200);
    }

    public function getDeleteUniversities(){

        $delete_universities = DB::select( DB::raw("SELECT id, name, users, email, phone,
                city, 'YES' as acc FROM universities"));
        return response()->json($delete_universities, 200);
    }

    public function getDuplicateUniversities(){
        $duplicate_universities = DB::table('universities')
            ->select('name', DB::raw('COUNT(*) as `count`'))
            ->groupBy('name')
            ->havingRaw('COUNT(*) > 1')
            ->get();
        $data['universities'] = $duplicate_universities;
        return response()->json($data, 200);
    }

    public function getAllPackages() {
        $packages = Package::all();
        return response()->json($packages, 200);
    }

    public function savePackages(Request $request){
        $packages = Package::all();
        $data = $request->input('data');

        foreach ($packages as $package){
            $id = $package->id;
            if($data['listing_' . $id] == true ){
                $listing = 1;
            }
            else{
                $listing = 0;
            }
            if($data['enhanced_listing_' . $id] == true ){
                $enhanced_listing = 1;
            }
            else{
                $enhanced_listing = 0;
            }
            if($data['lead_generation_' . $id] == true ){
                $lead_generation = 1;
            }
            else{
                $lead_generation = 0;
            }

            $package->listing = $listing;
            $package->enhanced_listing = $enhanced_listing;
            $package->lead_generation = $lead_generation;
            $package->school_fairs = (int)$data['school_fairs_' . $id];
            $package->school_activities = (int)$data['school_activities_' . $id];
            $package->email_marketing =(int)$data['email_marketing_' . $id];
            $package->marketing_support = (int)$data['marketing_support_' . $id];
            $package->digital_media_promotion = (int)$data['digital_media_promotion_' . $id];
            $package->digital_media_promotion_weekly = (int)$data['digital_media_promotion_weekly_' . $id];
            $package->SMS_marketing = (int)$data['SMS_marketing_' . $id];
            $package->save();
        }


        $packages = Package::all();
        return response()->json($packages, 200);

    }
}
