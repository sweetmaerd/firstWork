<?php


namespace App\Providers\ViewComposer;
use Illuminate\Contracts\View\View;
use Illuminate\Support\Facades\Auth;
use Illuminate\Foundation\Auth\User;



class AppComposer {
    public function compose(view $view) {
        if(Auth::user()) {
            $test = "Привет ".Auth::user()->name;
        } else {
            $test = "Привет гость";
        }
        $view->with('test',$test);
    }
} 