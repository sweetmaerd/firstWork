<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Content;
use App\User;
use App\Category;

class ContentController extends Controller
{
    public function getIndex() {
        $all = Content::where('showhide','show')->orderBy('id','desc')->paginate(5);
        return view('content')->with('all',$all);
    }
}
