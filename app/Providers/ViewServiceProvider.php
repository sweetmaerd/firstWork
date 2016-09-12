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
        View::composers([
            'App\Providers\ViewComposer\AppComposer'=>['layouts.app','templates.default'],
            'App\Providers\ViewComposer\DefaultComposer'=>'templates.default'
        ]);

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
