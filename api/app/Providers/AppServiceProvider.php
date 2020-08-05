<?php

namespace App\Providers;

use App\Models\Fair;
use App\Models\University;
use App\Observers\FairObserver;
use App\Observers\UniversityObserver;
use Illuminate\Support\ServiceProvider;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     *
     * @return void
     */
    public function register()
    {
        //
    }

    /**
     * Bootstrap any application services.
     *
     * @return void
     */
    public function boot()
    {
        Fair::observe(FairObserver::class);
        University::observe(UniversityObserver::class);
    }
}
