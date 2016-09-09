<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Redirect;
use App\Http\Requests;

class RedirectController extends Controller
{
    public function getBack(){
        return Redirect::back();
    }
}
