<?php

namespace App\Http\Controllers\Admin;
use App\Models\Curriculum;
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

class ManageSchoolController extends Controller
{
    /**
     * get list of school fairs
     */
    public function index(Request $request) {

        $fairs = Fair::where('school_id', Auth::user()->school_id)->get();

        $all_schools = School::orderBy('created_at','asc');

        if($request->input('search')){
            $searchText = $request->input('search');
            $all_schools->where(function($q) use ($searchText){
                $q->where('name','LIKE', '%' . $searchText . '%')->orWhere('email','LIKE', '%' . $searchText . '%');
            });

        }
        $schools= $all_schools->paginate(5)->appends(Input::except('page'))->onEachSide(1);

        $universities = University::get();
        $query = DB::table('functions')->whereNotNull('school_suspend')->get('school_suspend');
        return view('admin.manage_school.index',[
            'fairs' => $fairs,
            'schools' => $schools,
            'universities' => $universities,
            'query' => $query
        ]);

    }

    public function create() {
        $school = School::get();
        return view('admin.manage_school.add_school', compact(['school']));
    }

    public function edit($id) {
//        $school = School::where('id',$id)->get();
        $school = School::find($id);

        $user = User::where('school_id', '=' ,$school->id)->first();

        $curricula = Curriculum::all();

        $query = DB::table('functions')->whereNotNull('school_suspend')->get('school_suspend');
        return view('admin.manage_school.edit_school', [
            'school' => $school,
            'query' => $query,
            'user' => $user,
            'curricula' => $curricula
        ]);
    }

    public function store(Request $request) {

        $validator = Validator::make($request->all(), [
            'school_name' => 'required',            
            'phone' => 'required',
            'email' => 'required',
            'website' => 'required',
            'map_link' => 'required',
            
        ]);

        if ($validator->fails()) {
            return redirect()->route('admin.add_school')
                ->withErrors($validator)
                ->withInput();
        }

        $school_name = $request->get('school_name');
        $phone = $request->get('phone');
        $email = $request->get('email');
        $website = $request->get('website');
        $map_link = $request->get('map_link');

        $compus = json_encode($request->get('compus'));
        $country = json_encode($request->get('country'));
        $city = json_encode($request->get('city'));
        $address = json_encode($request->get('address'));
        
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

        return redirect()->route('admin.manage_school')->with([
            'error' => false,
            'message' => 'School created successfully !'
        ]);
    }

    public function update(Request $request, $id) {

        $validator = Validator::make($request->all(), [
            'school_name' => 'required',            
            'phone' => 'required',
            'email' => 'required',
            'website' => 'required',
            'map_link' => 'required',
        ]);

        if ($validator->fails()) {
            return redirect()->route('admin.edit_school', ['id' => $id])
                ->withErrors($validator)
                ->withInput();
        }

        $school_logo = $request->input('school-logo');
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

        $user_id = $request->input('user_id');

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

        if($user_id && $user_id != 0 ){
            $real_user_id = $user_id;
        }
        else{
            $new_user = new User();
            $new_user->name = $manage_users[0];
            $new_user->email = $manage_emails[0];
            $new_user->role = 'school';
            $new_user->school_id = $id;
            $new_user->university_id = 0;
            $new_user->password = Hash::make('12345678');
            $new_user->save();
            $real_user_id = $new_user->id;
        }

        $fair = School::where('id', $id)
            ->update([
                'name' => $school_name,
                'email' => $email,
                'phone' => $phone,
                'website' => $website,
                'map_link' => $map_link,
                'about_us' => $request->get('about_us'),
                'curriculum_id' => $request->get('curriculum'),
                'number_grade11' => $request->get('number_grade11'),
                'number_grade12' => $request->get('number_grade12'),
                'fees_grade11' => $request->get('fees_grade11'),
                'fees_grade12' => $request->get('fees_grade12'),
                'compus' => $compus,
                'country' => $country,
                'city' => $city,
                'address1' => $address_1,
                'logo' => $image_name,
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
                    $user->university_id = 0;
                    $user->role = 'school';
                    $user->email = $manage_emails[$index];


                    $user->password = Hash::make('12345678');
                    $user->save();
                }
            }
        }

        return redirect()->route('admin.manage_school')->with([
            'error' => false,
            'message' => 'School updated and added successfully!'
        ]);

        //Updated by @Prasad
        //Send notification to all Universities using mail
        $this->sendNotifyToUniversities($school);
    }
    public function suspend($id){
        $school = School::find($id);
        $school->state = 0;
        $school->save();

        return redirect()->route('admin.manage_school')->with([
            'error' => false,
            'message' => 'School suspended successfully!'
        ]);
    }

    public function unsuspend($id){
        $school = School::find($id);
        $school->state = 1;
        $school->save();

        return redirect()->route('admin.manage_school')->with([
            'error' => false,
            'message' => 'School unsuspended successfully!'
        ]);
    }
    public function userSuspend($id){
        $user = User::find($id);

        $user->state = 0;
        $user->save();

        return redirect()->route('admin.edit_school' ,['id'=>$user->school_id])->with([
            'error' => false,
            'message' => 'User suspended successfully!'
        ]);


    }
    public function userUnsuspend($id){
        $user = User::find($id);

        $user->state = 1;
        $user->save();

        return redirect()->route('admin.edit_school' ,['id'=>$user->school_id])->with([
            'error' => false,
            'message' => 'User unsuspended successfully!'
        ]);
    }
    
}
