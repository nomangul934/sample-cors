<?php

namespace App\Http\Controllers\Auth;

use App\Models\Country;
use App\Models\Gender;
use App\Models\Grade;
use App\Models\School;
use App\Models\SocialMedia;
use App\Models\Specialization;
use App\Models\Student;
use App\Models\User;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;
use Illuminate\Foundation\Auth\RegistersUsers;
use Illuminate\Http\Request;
class RegisterStudentsController extends Controller
{
    /*
    |--------------------------------------------------------------------------
    | Register School Controller
    |--------------------------------------------------------------------------
    |
    | This controller handles the registration of new users as well as their
    | validation and creation. By default this controller uses a trait to
    | provide this functionality without requiring any additional code.
    |
    */

    use RegistersUsers;

    /**
     * Where to redirect users after registration.
     *
     * @var string
     */
    // protected $redirectTo = '/university/invitations';

    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('guest');
    }

    /**
     * Show the application registration form.
     *
     * @return \Illuminate\Http\Response
     */
    public function showRegistrationForm()
    {
        $schools = School::all();
        $grades = Grade::all();
        $genders = Gender::all();
        $countries = Country::all();
        $social_medias = SocialMedia::all();
        $specializations = Specialization::all();
        return view('auth.register_students',[
            'schools' => $schools,
            'grades' => $grades,
            'genders' => $genders,
            'countries' => $countries,
            'social_medias' => $social_medias,
            'specializations' => $specializations
        ]);
    }

    public function showStudentRegistrationForm($name)
    {
        //  print($name);
        $beforename=str_replace("-"," ",$name);
        $school = School::where('name', '=', $beforename)->first();
        $grades = Grade::all();
        $genders = Gender::all();
        $countries = Country::all();
        $social_medias = SocialMedia::all();
        $specializations = Specialization::all();

        return view('auth.register_student',[
            'school' => $school,
            'grades' => $grades,
            'genders' => $genders,
            'countries' => $countries,
            'social_medias' => $social_medias,
            'specializations' => $specializations
        ]);
    }


    /**
     * Get a validator for an incoming registration request.
     *
     * @param  array  $data
     * @return \Illuminate\Contracts\Validation\Validator
     */
    protected function validator(array $data)
    {
        return Validator::make($data, [
            'name' => ['required', 'string', 'max:255'],
            'mobile' => ['required'],
            'email' => ['required', 'string', 'email', 'max:255', 'unique:users'],
            // 'password' => ['required', 'string', 'min:8', 'confirmed'],
        ]);
    }

    /**
     * Create a new user instance after a valid registration.
     *
     * @param  array  $data
     * @return \App\Models\User
     */
    protected function create(Request $data)
    {

        $student = Student::create([
            'name' => $data['name'],
            'email' => $data['email'],
            'school_id' => $data['school_id'],
            'nationality_id' => $data['nationality_id'],
            'gender_id' => $data['gender_id'],
            'mobile' => $data['mobile'],
            'grade_id' => $data['grade_id'],
            'sm_1_id' => $data['sm_1_id'],
            'sm_2_id' => 0,
            'sm_id_1' => $data['sm_id_1'],
            'sm_id_2' => 0,
            'specializations_1_id' => $data['specializations_1_id'],
            'specializations_2_id' => $data['specializations_2_id'],
            'study_destination_1_id' => $data['study_destination_1_id'],
            'study_destination_2_id' => $data['study_destination_2_id']

        ]);
        // $user = User::create([
        //     'name' => $data['name'],
        //     'email' => $data['email'],
        //     'password' => Hash::make($data['password']),
        //     'role' => 'student',
        //     'student_id' => $student->id,
        //     'ext' => '',
        //     'mobile' => $data['mobile'],
        //     'title' => '',
        // ]);
        return $student;
    }

    public function register(Request $request){
        $this->create($request);
        return redirect('https://udros.com/');
    }
}
