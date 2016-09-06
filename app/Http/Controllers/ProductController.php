<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Product;
use App\User;
use App\Category;

class ProductController extends Controller
{
    public function getIndex() {
        $all = Product::where('showhide','show')->orderBy('id','desc')->paginate(5);
        return view('index',['content'=>'templates.contentproduct','all'=>$all]);
    }
}
