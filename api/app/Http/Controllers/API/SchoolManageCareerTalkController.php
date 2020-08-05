<?php

namespace App\Http\Controllers\API;

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

class SchoolManageCareerTalkController extends Controller
{
    public function getCareerTalks(){
        $fairs = Fair::where('school_id', Auth::user()->school_id)->get();
        $school = School::find(Auth::user()->school_id);
        $univ_lists = University::get();
        $query = DB::table('functions')->whereNotNull('school_suspend')->get('school_suspend');
        //return view('school.manage_career_talks.index', compact(['fairs','school','univ_lists','query']));
        return response()->json(['success' => true], 200);
    }
}
