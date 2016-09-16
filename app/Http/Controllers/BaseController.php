<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

use App\Http\Requests;
use App\Content;
use App\Category;
use App\Http\Controllers\Controller;


class BaseController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function getIndex()
    {
        $news = Category::where('name','News')->first()->content()->where('showhide','show')->orderBy('id','desc')->get();
        //dd($news);
        $albums = Category::where('name','Albums')->first()->content()->where('showhide','show')->orderBy('id','desc')->get();
        return view('index')->with(['news'=>$news, 'albums'=>$albums]);
    }

}
