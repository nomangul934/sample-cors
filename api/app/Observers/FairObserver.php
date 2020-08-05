<?php

namespace App\Observers;

use App\Mail\FairCreated;
use App\Mail\InvitationCreatedMail;
use App\Models\Fair;
use App\Models\Invitation;
use App\Models\University;
use App\Models\User;
use Illuminate\Support\Facades\Mail;

class FairObserver
{
    /**
     * Handle the fair "created" event.
     *
     * @param  \App\Models\Fair  $fair
     * @return void
     */
    public function created(Fair $fair)
    {
//        $universities = University::all();
//        foreach ($universities as $university) {
//            $invitation = Invitation::create([
//                'fair_id' => $fair->id,
//                'university_id' => $university->id
//            ]);
//            $univerisity_user = User::select('email')->where('university_id','=', $university->id)->get();
////            dd($univerisity_user);
////            Mail::to($univerisity_user)->send(new InvitationCreatedMail($invitation));
//            Mail::to('tinycoding5@gmail.com')->send(new InvitationCreatedMail($invitation));
//        }
    }

    /**
     * Handle the fair "updated" event.
     *
     * @param  \App\Models\Fair  $fair
     * @return void
     */
    public function updated(Fair $fair)
    {
        //
    }

    /**
     * Handle the fair "deleted" event.
     *
     * @param  \App\Models\Fair  $fair
     * @return void
     */
    public function deleted(Fair $fair)
    {
        //
    }

    /**
     * Handle the fair "restored" event.
     *
     * @param  \App\Models\Fair  $fair
     * @return void
     */
    public function restored(Fair $fair)
    {
        //
    }

    /**
     * Handle the fair "force deleted" event.
     *
     * @param  \App\Models\Fair  $fair
     * @return void
     */
    public function forceDeleted(Fair $fair)
    {
        //
    }
}
