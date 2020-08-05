<?php

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

use Illuminate\Support\Facades\Auth;
use App\Mail\TestEmail;

Route::get('/', function () {
    if(Auth::check()){
        if(Auth::user()->role === 'school') return redirect()->route('school.fairs_list');
        if(Auth::user()->role === 'university') return redirect()->route('university.invitations_list');
        if(Auth::user()->role === 'admin') return redirect()->route('admin.manage_university');
        if(Auth::user()->role === 'student') return redirect()->route('student.index');
    }
    return redirect('/login');
});




Auth::routes();

Route::get('/change-password', 'Auth\ChangePasswordController@showChangePasswordForm')->name('change_password_page');
Route::post('/change-password', 'Auth\ChangePasswordController@change_pwd')->name('change_password');

Route::get('/university/register', 'Auth\RegisterUniversityController@showRegistrationForm')->name('register_university');
Route::post('/university/register', 'Auth\RegisterUniversityController@register');

Route::get('/{name}','Auth\RegisterStudentsController@showStudentRegistrationForm');

Route::get('/students/register','Auth\RegisterStudentsController@showRegistrationForm')->name('register_students');
Route::post('/students/register', 'Auth\RegisterStudentsController@register');


Route::get('/university/import', 'University\ImportController@importPage')->name('import_universities_page');
Route::post('/university/import', 'University\ImportController@import')->name('import_universities');


Route::middleware('school')->prefix('school')->namespace('School')->name('school.')->group(function () {
    Route::get('/profile', 'ProfileController@update')->name('update_profile');
    Route::get('/user_profile','ProfileController@userProfile')->name('user_profile');
    Route::post('/schoolProfile', 'ProfileController@edit')->name('edit_profile');
    Route::post('/userProfile/{id}' ,'ProfileController@userUpdate')->name('user_update');

    Route::get('/confirmed_universities','UniversityController@confirmed_universities')->name('confirmed_universities');
    Route::get('/students_registration','UniversityController@students_registration')->name('students_registration');

    Route::get('/send-test-email',function(){
        Mail::to('tempo4039@gmail.com')->send(new TestEmail());
        echo 'sent';
    });

    Route::get('/fairs', 'FairController@index')->name('fairs_list');
    Route::get('/fairs/create', 'FairController@create')->name('create_fair');
    Route::post('fairs', 'FairController@store')->name('store_fair');
    Route::get('/fairs/edit/{id}', 'FairController@edit')->name('edit_fair');
    Route::post('fairs/{id}', 'FairController@update')->name('update_fair');
    Route::get('/fairs/{id}/participants', 'FairController@participants')->name('fair_participants');

    Route::get('/workshop_list', 'UniversityController@workshop_list')->name('workshop_list');
    Route::get('/univ_lists', 'UniversityController@index')->name('univ_lists');

    Route::get('/counselor_lists', 'CounselorController@index')->name('counselor_lists');
    Route::post('/update_counselor/{id}', 'CounselorController@update')->name('update_counselor');

    Route::get('/career_talk_list', 'ManageCareerTalksController@index')->name('career_talk_list');
    Route::get('/create_career_talk', 'ManageCareerTalksController@create')->name('create_career_talk');
    Route::get('/confirmed_sessions', 'ManageCareerTalksController@confirmed_sessions')->name('confirmed_sessions');


});

Route::middleware('university')->prefix('university')->namespace('University')->name('university.')->group(function () {
    Route::get('/invitations', 'InvitationController@index')->name('invitations_list');
    Route::get('/invitations/{id}/accept', 'InvitationController@accept')->name('accept_invitation');
    Route::get('/invitations/{id}/reject', 'InvitationController@reject')->name('reject_invitation');
    Route::get('/schools', 'SchoolController@index')->name('schools_list');
    Route::get('/schools/{id}', 'SchoolController@show')->name('school_details');
    Route::get('/past_university','InvitationController@pastUniversity')->name('past_university');
    Route::get('/future_university','InvitationController@futureUniversity')->name('future_university');

    Route::get('/profile', 'ProfileController@update')->name('update_profile');
    Route::post('/profile', 'ProfileController@edit')->name('edit_profile');
    Route::get('/user/profile','ProfileController@userProfile')->name('user_profile');
    Route::post('/user/update/{id}', 'ProfileController@userUpdate')->name('user_update');

    Route::get('/users_list', 'UsersController@index')->name('users_list');
    Route::post('/add_user', 'UsersController@add')->name('add_user');
});
Route::middleware('admin')->prefix('admin')->namespace('Admin')->name('admin.')->group(function() {
    Route::get('/manage_university','ManageUniversityController@index')->name('manage_university');
    Route::get('/edit_counselor','ManageUniversityController@edit_counselor')->name('edit_counselor');
    Route::get('/edit_univ/{id}','ManageUniversityController@edit')->name('edit_univ');
    Route::post('/update_univ/{id}','ManageUniversityController@update')->name('update_univ');
    Route::get('/update_packages','ManageUniversityController@update_packages')->name('update_packages');
    Route::post('/save/packages','ManageUniversityController@savePackages')->name('save_packages');
    Route::post('/university/package', 'ManageUniversityController@getPackage');
    Route::get('/suspend1/{id}','ManageUniversityController@suspend')->name('suspend');
    Route::get('/suspend2/{id}','ManageUniversityController@suspend1')->name('suspend1');
    Route::get('/university/user/suspend/{id}', 'ManageUniversityController@userSuspend');
    Route::get('/university/user/unsuspend/{id}', 'ManageUniversityController@userUnsuspend');
    Route::get('/past_university','ManageUniversityController@pastUniversity')->name('past_university');
    Route::get('/future_university','ManageUniversityController@futureUniversity')->name('future_university');


    Route::get('/manage_school','ManageSchoolController@index')->name('manage_school');
    Route::get('/add_school','ManageSchoolController@create')->name('add_school');
    Route::post('/store_school','ManageSchoolController@store')->name('store_school');
    Route::get('/edit_school/{id}','ManageSchoolController@edit')->name('edit_school');
    Route::post('/update_school/{id}','ManageSchoolController@update')->name('update_school');
    Route::get('/school/suspend/{id}', 'ManageSchoolController@suspend');
    Route::get('/school/unsuspend/{id}', 'ManageSchoolController@unsuspend');

    Route::get('/school/user/suspend/{id}', 'ManageSchoolController@userSuspend');
    Route::get('/school/user/unsuspend/{id}', 'ManageSchoolController@userUnsuspend');


    Route::get('/manage_users','ManageUsersController@index')->name('manage_users');
    Route::get('/add_user','ManageUsersController@add')->name('add_user');
    Route::get('/edit_user/{id}','ManageUsersController@edit')->name('edit_user');
    Route::get('/user/suspend/{id}','ManageUsersController@suspend')->name('user_suspend');
    Route::get('/user/unSuspend/{id}','ManageUsersController@unSuspend')->name('user_unSuspend');
    Route::post('/user/save','ManageUsersController@saveUser')->name('save_user');
    Route::post('/user/update/{id}','ManageUsersController@updateUser')->name('user_update');
    Route::post('/school/compus','ManageUsersController@schoolCompus');
    Route::post('/university/compus','ManageUsersController@universityCompus');
    Route::get('/create_fair', 'ManageFairsController@create')->name('create_fair');
    Route::post('store_fair', 'ManageFairsController@store')->name('store_fair_admin');
    Route::get('/manage_fairs','ManageFairsController@index')->name('manage_fairs');
    Route::get('/edit_fair/{id}','ManageFairsController@edit')->name('edit_fair');
    Route::post('/update_fair/{id}','ManageFairsController@update')->name('update_fair');
    Route::get('/delete_fair/{id}','ManageFairsController@delete')->name('delete_fair');
    Route::get('/approve_fair/{id}','ManageFairsController@appFair')->name('fair_app');
    Route::get('/unApprove_fair/{id}','ManageFairsController@nppFair')->name('fair_npp');
    Route::get('/change_app_state','ManageFairsController@changeApproveState');

    Route::get('/career_talk_list','ManagecareertalksController@index')->name('career_talk_list');
    Route::get('/add_career_talk','ManagecareertalksController@create')->name('add_career_talk');
    Route::get('/edit_talk','ManagecareertalksController@edit')->name('edit_talk');
    Route::get('/manage_workshop','ManageWorkshopController@index')->name('manage_workshop');


    Route::get('/manage_system_clean_up_fair', 'ManageSystemCleanUpController@fairIndex')->name('fair_delete');
    Route::get('/manage/fair_confirm', 'ManageSystemCleanUpController@fairConfirm');
    Route::get('/manage_system_clean_up_fair/delete/{id}', 'ManageSystemCleanUpController@fairDelete')->name('fair_list_delete');
    Route::get('/fair_view/{id}','ManageSystemCleanUpController@fairView')->name('fair_view');

    Route::get('/manage_system_clean_up_university', 'ManageSystemCleanUpController@universityIndex')->name('university_delete');
    Route::get('/manage/university_confirm', 'ManageSystemCleanUpController@universityConfirm');
    Route::get('/manage_system_clean_up_university/delete/{id}', 'ManageSystemCleanUpController@universityDelete')->name('university_list_delete');

    Route::get('/manage_system_clean_up_school', 'ManageSystemCleanUpController@schoolIndex')->name('school_delete');
    Route::get('/manage_system_clean_up_school/delete/{id}', 'ManageSystemCleanUpController@schoolDelete')->name('school_list_delete');

    Route::get('/manage_system_clean_up_user', 'ManageSystemCleanUpController@userIndex')->name('user_delete');
    Route::get('/manage_system_clean_up_user/delete/{id}', 'ManageSystemCleanUpController@userDelete')->name('user_list_delete');

    Route::get('/manage_system_clean_up_duplicate_user', 'ManageSystemCleanUpController@duplicateUserIndex')->name('duplicate_users');

    Route::get('/manage_system_clean_up_duplicate_university', 'ManageSystemCleanUpController@duplicateUniversityIndex')->name('duplicate_university');

    Route::get('/manage_system_clean_up_duplicate_school', 'ManageSystemCleanUpController@duplicateSchoolIndex')->name('duplicate_school');



});
Route::middleware('student')->prefix('student')->namespace('student')->name('student.')->group(function () {
    Route::get('/index', 'StudentController@index')->name('index');

});
Route::get('/invitation/register', 'University\InvitationController@register_from_mail')->name('university_invitation_register');

