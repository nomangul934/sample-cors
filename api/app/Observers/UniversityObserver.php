<?php

namespace App\Observers;

use App\Models\Fair;
use App\Models\Invitation;
use App\Models\University;

class UniversityObserver
{
    /**
     * Handle the fair "created" event.
     *
     * @param  \App\Models\University  $university
     * @return void
     */
    public function created(University $university)
    {
        $fairs = Fair::all();
        foreach ($fairs as $fair) {
            Invitation::create([
                'fair_id' => $fair->id,
                'university_id' => $university->id
            ]);
        }
    }
}
