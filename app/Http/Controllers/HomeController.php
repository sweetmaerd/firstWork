<?php

namespace App\Http\Controllers;

use App\Http\Requests;
use App\Product;
use App\User;
use App\Category;
use Illuminate\Support\Facades\DB;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Input;
use Illuminate\Support\Collection;


class HomeController extends Controller
{

    protected $category;
    public static $pag = 5;
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
        $this->category = Category::where('showhide','show')->get(); //выбираю категории с параметном show
        $this->users = User::select('name')->get(); //выбираю админов
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $content = Product::paginate($pag = 5); //применяю пагиницию для контента
        return view('home')->with(['category'=> $this->category, 'content'=>$content]);//загружаю шаблон home
    }
    public function getPagin($pag)
    {
        self::$pag = $pag;
        return redirect('/home')->with('pag',$pag);//редирект на home
    }
    
    public function postIndex(Requests\ProductRequest $r)
    {
        $this->picture($r);
        Product::create($r->all());//добавляю запись в БД в таблицу Products
        return redirect('/home');//редирект на home
    }
    
    public function getDelete($id)
    {
        Product::where('id',$id)->delete();//удаляю зарись из таблицы Products БД
        return redirect('/home');//редирект на home
    }

    public function getUpdate($id)
    {
        $entery = Product::where('id',$id)->get();//получаю запись с параметром ID из таблицы Products БД
        return view('home_update')->with(['entery'=>$entery[0],'users'=> $this->users, 'category'=>$this->category]);//загружаю шаблон home_update
    }

    public function postUpdate(Requests\ProductRequest $r, $id)
    {
        $this->picture($r);
        $cont = collect($r->all());
        $cont->pop();
        $cont->all();
        Product::where('id',$id)->update($cont->all());//обновляю запись с параметром ID в таблице Products БД
        return redirect('/home');//редирект на home
    }

    public function getCreate()
    {
        return view('home_create')->with(['category'=> $this->category, 'users'=> $this->users]);//загружаю шаблон home_create
    }

    public function getPage($id)
    {
        if(is_numeric($id)) {
            $row = 'id';
        } else {
            $row = 'url';
        }
        $post = Product::where($row,$id)->first();
        return view('home_content')->with(['post'=> $post]);//загружаю шаблон home_comtent
    }

    public function picture(&$r)
    {
        $pict = Input::file('picture1');
        $dir = '/media/uploads/';
        $time = time();
        $pic = \App::make('\App\Libs\ImagesClass')->url($pict, $dir, $time);
        if($pic) {
            $r['img'] = $pic;
        }
    }
}
