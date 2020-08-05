<?php

namespace App\Http\Controllers\school;

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

class ManageCareerTalksController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $fairs = Fair::where('school_id', Auth::user()->school_id)->get();
        $school = School::find(Auth::user()->school_id);
        $univ_lists = University::get();
        $query = DB::table('functions')->whereNotNull('school_suspend')->get('school_suspend');
        return view('school.manage_career_talks.index', compact(['fairs','school','univ_lists','query']));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        // var_dump("test");exit();
        $fairs = Fair::where('school_id', Auth::user()->school_id)->get();
        $school = School::find(Auth::user()->school_id);
        $univ_lists = University::get();
        $query = DB::table('functions')->whereNotNull('school_suspend')->get('school_suspend');
        return view('school.manage_career_talks.create', compact(['fairs','school','univ_lists','query']));
    }
    public function confirmed_sessions()
    {
        // var_dump("test");exit();
        $fairs = Fair::where('school_id', Auth::user()->school_id)->get();
        $school = School::find(Auth::user()->school_id);
        $univ_lists = University::get();
        $query = DB::table('functions')->whereNotNull('school_suspend')->get('school_suspend');
        return view('school.manage_career_talks.confirmed_sessions', compact(['fairs','school','univ_lists','query']));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
