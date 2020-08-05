<?php

namespace App\Http\Controllers\API;

use App\Models\Curriculum;
use http\Env\Response;
use App\Models\Invitation;
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
use App\Mail\SchoolFiarupdateMail;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Facades\Input;
use Illuminate\Support\Facades\Hash;

class SchoolController extends Controller
{
    public function getSchools(Request $request){
        $school_id = $request->input('school_id');
        $fairs = Fair::where('school_id', $school_id)->get();

        $all_schools = School::orderBy('created_at','asc');

        if($request->input('search')){
            $searchText = $request->input('search');
            $all_schools->where(function($q) use ($searchText){
                $q->where('name','LIKE', '%' . $searchText . '%')->orWhere('email','LIKE', '%' . $searchText . '%');
            });

        }
        $schools= $all_schools->paginate(5)->appends(Input::except('page'))->onEachSide(1);

        /*$universities = University::get();*/
        $query = DB::table('functions')->whereNotNull('school_suspend')->get('school_suspend');
        $data['fairs'] = $fairs;
        $data['schools'] = $schools;
        /*$data['universities'] = $universities;*/
        $data['query'] = $query;
        return response()->json($data, 200);
    }

    public function create(){
        $school = School::get();
        return response()->json(compact(['school']), 200);
    }

    public function getAllSchools(){
        $school = School::get();
        return response()->json(compact(['school']), 200);
    }

    public function getAddSchoolContacts(Request $request){
        $searchText = $request->input("search");

        if($searchText){
            $schools = DB::table('schools')
                ->select('id', 'name', 'email', 'phone', 'state')
                ->where('name', 'LIKE', '%' . $searchText . '%')
                ->orWhere('email','LIKE', '%' . $searchText . '%')
                ->orWhere('phone', 'LIKE', '%' . $searchText . '%')
                ->orderBy('created_at','asc')
                ->get();
        }
        else{
            $schools= DB::table('schools')
                ->select('id', 'name', 'email', 'phone', 'state')
                ->orderBy('created_at','asc')
                ->get();
        }
        return response()->json($schools, 200);
    }

    public function getSchool(Request $request){
        $school_id = $request->input('school_id');
        $school = School::find($school_id);

        $user = User::where('school_id', '=' ,$school->id)->first();

        $curricula = Curriculum::all();

        $query = DB::table('functions')->whereNotNull('school_suspend')->get('school_suspend');

        $data['school'] = $school;
        $data['user'] = $user;
        $data['curricula'] = $curricula;
        return response()->json($data, 200);
    }

    public function updateSchool(Request $request){
        $school_data = $request->input('school_data');
        $id = $request->input('school_id');

        $school_logo = $school_data['school_logo'];
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

        $user_id = $school_data['user_id'];

        $school_name = $school_data['school_name'];
        $phone = $school_data['phone'];
        $email = $school_data['email'];
        $website = $school_data['website'];
        $map_link = $school_data['map_link'];


        $compuses = $school_data['compus'];
        $countries = $school_data['country'];
        $cities = $school_data['city'];
        $address = $school_data['address'];
        $manage_users = $school_data['users'];
        $manage_emails = $school_data['emails'];

        $compus = json_encode($request->get('compus'));
        $country = json_encode($request->get('country'));
        $city = json_encode($request->get('city'));
        $address_1 = json_encode($request->get('address'));
        $manage_user =  json_encode($request->get('users'));
        $manage_email = json_encode($request->get('emails'));

        if($user_id && $user_id != 0 ){
            $real_user_id = $user_id;
        }
        else{
            $new_user = new User();
            $new_user->name = $manage_users[0] != null ? $manage_users[0] : 'Admin';
            $new_user->email = $manage_emails[0] != null ? $manage_emails[0] : 'Admin@odros.com';
            $new_user->role = 'school';
            $new_user->school_id = $id;
            $new_user->university_id = 0;
            $new_user->password = Hash::make('12345678');
            $new_user->state = 1;
            $new_user->save();
            $real_user_id = $new_user->id;
        }

        $curriculum_id = DB::table('curricula')
            ->where('label', '=', $school_data['curriculum'])
            ->get()[0]->id;
        DB::table('schools')->where('id', $id)
            ->update([
                'name' => $school_name,
                'email' => $email,
                'phone' => $phone,
                'website' => $website,
                'map_link' => $map_link,
                'about_us' => $school_data['about_us'],
                'curriculum_id' => $curriculum_id,
                'number_grade11' => $school_data['number_grade11'],
                'number_grade12' => $school_data['number_grade12'],
                'fees_grade11' => $school_data['fees_grade11'],
                'fees_grade12' => $school_data['fees_grade12'],
                'compus' => $compus,
                'country' => $country,
                'city' => $city,
                'address1' => $address_1,
                'logo' => $image_name,
                'users' => $manage_user,
                'emails' => $manage_email
            ]);


        $school = School::find($id);
        $user = User::where('school_id', '=' ,$school->id)->first();
        $curricula = Curriculum::all();

        $data['school'] = $school;
        $data['user'] = $user;
        $data['curricula'] = $curricula;
        return response()->json($data, 200);

        //Updated by @Prasad
        //Send notification to all Universities using mail
        $this->sendNotifyToUniversities($school);
    }

    public function storeSchool(Request $request){
        /*$school_data = $request->input('school_data');
        $school_name = $school_data['school_name'];
        $phone = $school_data['phone'];
        $email = $school_data['email'];
        $website = $school_data['website'];
        $map_link = $school_data['map_link'];*/

        $school_name = $request->input('school_name');
        $phone = $request->input('phone');
        $email = $request->input('email');
        $website = $request->input('website');
        $map_link = $request->input('map_link');

        $compus = json_encode($request->get('compus'));
        $country = json_encode($request->get('country'));
        $city = json_encode($request->get('city'));
        $address = json_encode($request->get('address'));
        /*$compus = $school_data['compus'];
        $country = $school_data['country'];
        $city = $school_data['city'];
        $address = $school_data['address'];*/

        School::create([
            'name' => $school_name,
            'email' => $email,
            'phone' => $phone,
            'website' => $website,
            'map_link' => $map_link,
            'compus' => $compus,
            'country' => $country,
            'city' => $city,
            'address1' => $address,
        ]);

        return response()->json(['success' => true], 200);
    }

    public function suspendSchool(Request $request){
        $school_id = $request->input('school_id');
        $school = School::find($school_id);
        $school->state = ($school->state + 1) % 2;
        $school->save();
        return response()->json(['state' => $school->state], 200);
    }

    public function suspendUser(Request $request){
        $user = User::find($request->input('user_id'));
        $user->state = ($user->state + 1) % 2;
        $user->save();
        return response()->json(['state' => $user->state], 200);
    }

    public function getDeleteSchools(){
        $schools = DB::table('schools')
            ->select('id', 'name', 'users', 'emails', 'phone', 'website', 'city')->get();
        return response()->json($schools, 200);
    }

    public function schoolDelete(Request $request){
        $school = School::find($request->input('school_id'));

        $fairs = Fair::where('school_id', '=', $school->id)->get();
        if($fairs){
            foreach ($fairs as $fair){
                $invitations = Invitation::where('fair_id', '=', $fair->id)->get();

                if($invitations){
                    foreach ($invitations as $invitation){
                        $invitation->delete();
                    }
                }
                $fair->delete();
            }
        }

        $users = User::where('school_id', '=', $school->id)->get();

        if($users){
            foreach($users as $user){
                $user->delete();
            }
        }

        $school->delete();

        $schools = DB::table('schools')
            ->select('id', 'name', 'users', 'emails', 'phone', 'website', 'city')->get();
        return response()->json($schools, 200);
    }

    public function getDuplicateSchools(){
        $duplicate_schools = DB::table('schools')
            ->select('name', DB::raw('COUNT(*) as `count`'))
            ->groupBy('name')
            ->havingRaw('COUNT(*) > 1')
            ->get();

        $data['schools'] = $duplicate_schools;
        return response()->json($data, 200);
    }
}
