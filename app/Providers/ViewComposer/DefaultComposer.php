<?php

namespace App\Providers\ViewComposer;
use Illuminate\Support\Facades\Auth;
use Illuminate\Contracts\View\View;
use App\Http\Controllers\BasketController as Basket;

class DefaultComposer {
    public function compose(view $view){
        if(!Basket::$count) {
            Basket::cook_arr();
        }
        $view->with('count',Basket::$count);
    }
}