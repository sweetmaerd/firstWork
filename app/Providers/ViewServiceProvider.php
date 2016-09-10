<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use Illuminate\Support\Facades\View;

class ViewServiceProvider extends ServiceProvider
{
    /**
     * Bootstrap the application services.
     *
     * @return void
     */
    public function boot()
    {
        View::composer('layouts.app','App\Providers\ViewComposer\AppComposer');

    }

    /**
     * Register the application services.
     *
     * @return void
     */
    public function register()
    {
        //dd('test');
    }
}
