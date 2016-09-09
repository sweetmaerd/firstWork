<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Content;
use App\User;
use App\Category;

class ContentController extends Controller {
    public $tov=[];
    

    public function getIndex() {
        $all = Content::where('showhide','show')->orderBy('id','desc')->paginate(5);
        return view('content')->with('all',$all);
    }
    public function getCategory($id='News') {
        $cat = Category::where('alias',$id)->first();
        $all = Content::where(['showhide'=>'show', "categories_id"=>$cat->id])->orderBy('id','desc')->paginate(5); //Получаю все записипо заданным параметрам
        return view('content')->with('all',$all);
    }
    
}
