<?php

namespace App\Providers;

use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\View;
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
        // Set variables for all views after session has been started
        View::composer('*', function ()
        {
            $isAdmin = (isset(Auth::user()->role->id) && Auth::user()->role->id === 1);
            View::share('isAdmin', $isAdmin);

            $isPremiumUser = (isset(Auth::user()->role->id) && Auth::user()->role->id === 2);
            View::share('isPremiumUser', $isPremiumUser);

            $isUser = (isset(Auth::user()->role->id) && Auth::user()->role->id === 3);
            View::share('isUser', $isUser);

            if ($isAdmin) {
                $projects = DB::table('projects')->get()->sortByDesc('id');
            } else {
                $projects = DB::table('projects')->get()->where('show', '1')->sortByDesc('id');
            }
            View::share('projects', $projects);
        });
    }
}
