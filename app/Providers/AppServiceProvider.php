<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use App\Role;
use Session;
class AppServiceProvider extends ServiceProvider
{
    /**
     * Bootstrap any application services.
     *
     * @return void
     */
    public function boot()
    {
        //


    }

    /**
     * Register any application services.
     *
     * @return void
     */
    public function register()
    {
        //

         foreach (glob(app_path() . '/Helpers/*.php') as $file) {
        require_once($file);
    }
    }
}
