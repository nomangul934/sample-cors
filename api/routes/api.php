<?php

use Illuminate\Http\Request;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/

/*Route::middleware('auth:api')->get('/user', function (Request $request) {
    return $request->user();
});*/
header('Access-Control-Allow-Origin: *');
header('Access-Control-Allow-Methods:  POST, GET, OPTIONS, PUT, DELETE');
header('Access-Control-Allow-Headers:  Content-Type, X-Auth-Token, Origin, Authorization, x-ijt');
Route::group([ 'prefix' => 'auth'], function (){
    Route::group(['middleware' => ['guest:api', 'cors']], function () {
        Route::post('login', 'API\AuthController@login');
        Route::post('signup', 'API\AuthController@signup');
    });
    Route::group(['middleware' => ['auth:api', 'cors']], function() {

        Route::get('logout', 'API\AuthController@logout');
        Route::get('access-token', 'API\AuthController@getUser');
    });
});


Route::group(['middleware' => ['auth:api', 'cors']], function() {
    Route::post('get_universities', 'API\UniversityController@getUniversities');

    Route::post('past_confirmed', 'API\UniversityController@getPastConfirms');
    Route::post('future_confirmed', 'API\UniversityController@getFutureConfirms');

    Route::post('get_schools', 'API\SchoolController@getSchools');
    Route::post('add_school', 'API\SchoolController@create');
    Route::post('get_addschool_contacts', 'API\SchoolController@getAddSchoolContacts');

    Route::post('get_users', 'API\UserController@getUsers');

    Route::post('get_fairs', 'API\FairController@getFairs');

    Route::post('get_delete_fairs', 'API\FairController@getDeleteFairs');
    Route::post('get_delete_universities', 'API\UniversityController@getDeleteUniversities');
    Route::post('get_delete_schools', 'API\SchoolController@getDeleteSchools');
    Route::post('get_delete_users', 'API\UserController@getDeleteUsers');
    Route::post('get_duplicate_users', 'API\UserController@getDuplicateUsers');
    Route::post('get_duplicate_universities', 'API\UniversityController@getDuplicateUniversities');
    Route::post('get_duplicate_schools', 'API\SchoolController@getDuplicateSchools');

    Route::post('get_university', 'API\UniversityController@getUniversity');
    Route::post('update_university', 'API\UniversityController@updateUniversity');
    Route::post('university_suspend', 'API\UniversityController@suspendUniversity');

    Route::post('user_suspend', 'API\UserController@suspendUser');
    Route::post('get_school', 'API\SchoolController@getSchool');
    Route::post('get_user', 'API\UserController@getUser');
    Route::post('update_user', 'API\UserController@updateUser');
    Route::post('update_user_schooltype', 'API\UserController@updateUserSchoolType');
    Route::post('add_user', 'API\UserController@addUser');
    Route::post('save_user', 'API\UserController@saveUser');
    Route::post('add_updateUser', 'API\UserController@addUpdateUser');
    Route::post('get_all_schools', 'API\SchoolController@getAllSchools');
    Route::post('get_fair', 'API\FairController@getFair');
    Route::post('update_fair', 'API\FairController@updateFair');
    Route::post('store_fair', 'API\FairController@storeFair');
    Route::post('change_approve', 'API\FairController@approveChange');
    Route::post('get_packages', 'API\UniversityController@getAllPackages');
    Route::post('update_package', 'API\UniversityController@savePackages');

    Route::post('university/user_suspend', 'API\UniversityController@suspendUser');

    Route::post('update_school', 'API\SchoolController@updateSchool');
    Route::post('store_school', 'API\SchoolController@storeSchool');
    Route::post('school_suspend', 'API\SchoolController@suspendSchool');
    Route::post('school/user_suspend', 'API\SchoolController@suspendUser');

    Route::post('cleanup/fair', 'API\FairController@fairDelete');
    Route::post('cleanup/university', 'API\UniversityController@universityDelete');
    Route::post('cleanup/school', 'API\SchoolController@schoolDelete');
    Route::post('cleanup/user', 'API\UserController@userDelete');

    Route::post('school_admin/get_fairs', 'API\SchoolFairController@getFairs');
    Route::post('school_admn/store_fair', 'API\SchoolFairController@storeFair');
    Route::post('school_admin/get_editfair', 'API\SchoolFairController@editFair');
    Route::post('school_admin/update_fair', 'API\SchoolFairController@updateFair');
    Route::post('school_admin/get_participants', 'API\SchoolFairController@getParticipants');

    Route::post('school_admin/get_univs', 'API\SchoolUniversityController@getUniversities');
    Route::post('school_admin/get_confirm_univs', 'API\SchoolUniversityController@confirmed_universities');

    Route::post('school_admin/get_counselors', 'API\SchoolCounselorController@get_counselors');
    Route::post('school_admin/update_counselors', 'API\SchoolCounselorController@update');

    Route::post('school_admin/student_registeration', 'API\SchoolUniversityController@students_registration');
    Route::post('school_admin/workshop_list', 'API\SchoolUniversityController@workshop_list');

    Route::post('school_admin/view_career_talks', 'API\SchoolManageCareerTalkController@getCareerTalks');


    Route::post('univ_admin/get_invitations', 'API\UniversityFairController@getInvitations');
    Route::post('univ_admin/accept_invitation', 'API\UniversityFairController@acceptInvitation');
    Route::post('univ_admin/reject_invitation', 'API\UniversityFairController@rejectInvitation');
    Route::post('univ_admin/get_pastconfirmed', 'API\UniversityFairController@getPastConfirmed');
    Route::post('univ_admin/get_futureconfirmed', 'API\UniversityFairController@getFutureConfirmed');

    Route::post('univ_admin/get_schools', 'API\UniversitySchoolController@getSchools');

    Route::post('univ_admin/get_users', 'API\UniversityUserController@getUsers');
    Route::post('univ_admin/save_user', 'API\UniversityUserController@add');
});




