<?php

namespace App\Http\Controllers\University;
use Illuminate\Support\Facades\Auth;
use App\Models\School;
use App\Models\University;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Input;

class SchoolController extends Controller
{
    /**
     * List of all system schools
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function index(Request $request) {
        $all_schools = School::orderBy('created_at','asc');

        if($request->input('search')){
            $searchText = $request->input('search');
            $all_schools->where(function($q) use ($searchText){
                $q->where('name','LIKE', '%' . $searchText . '%')->orWhere('email','LIKE', '%' . $searchText . '%');
            });

        }
        $schools= $all_schools->paginate(5)->appends(Input::except('page'))->onEachSide(1);
        $university = University::where('id',Auth::user()->university_id)->get()->first();
        return view('university.school.index', compact('schools','university'));
    }

    /**
     * Show a school details
     * @param $id
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function show($id) {
        $school = School::find($id);

        return view('university.school.show', compact('school'));
    }
}
