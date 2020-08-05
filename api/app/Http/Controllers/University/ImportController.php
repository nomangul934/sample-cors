<?php

namespace App\Http\Controllers\University;

use App\Models\User;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Validator;
use Maatwebsite\Excel\Facades\Excel;


class ImportController extends Controller
{
    public function importPage() {
        return view('university.import');
    }

    public function import(Request $request) {
        $validator = Validator::make($request->all(), [
            'file' => [
                'bail', 'required'
            ],
        ]);

        if ($validator->fails()) {
            return redirect()->route('import_universities_page')
                ->withErrors($validator)
                ->withInput();
        }

        if($request->file) {
            $imageName = time().'.'.$request->file->getClientOriginalExtension();
            Log::info($imageName);

            $request->file->move(public_path('uploads'), $imageName);

            Excel::load(public_path('uploads/'.$imageName), function($reader) {

                $reader->each(function($row) {

                    $user = new User();
                    $user->name = $row->contact_name;
                    $user->email = $row->contact_email;
                    $user->password = Hash::make($row->contact_email);
                    $user->phone = $row->contact_phone;
                    $user->role = 'university';
                    $user->save();

                    DB::table('universities')->insert([
                        'name'          => $row->name,
                        'email'         => $row->email,
                        'user_id'       => $user->id
                    ]);

                });

            });

        }
        return back()->with(['message' => 'Universities imported successfully !']);
    }
}
