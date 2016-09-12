<?php

namespace App\Http\Controllers;

use App\Http\Requests;
use App\Content;
use App\User;
use App\Category;
use Illuminate\Support\Facades\DB;
//use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
//use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Input;
//use Illuminate\Support\Collection;
use Event;
use App\Events\AddEmail;
use App\Order;
//use Illuminate\Support\Facades\Redirect;
use That0n3guy\Transliteration\Facades\Transliteration;



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
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $content = Content::paginate($pag = 5); //применяю пагиницию для контента
        //Event::fire(new AddEmail(Auth::user()->id,'Привет. Посмотри, может найдешь что-то интересное'));
        return view('home')->with(['category'=> $this->category, 'content'=>$content]);//загружаю шаблон home
    }
    public function getPagin($pag)
    {
        self::$pag = $pag;
        return redirect('/home')->with('pag',$pag);//редирект на home
    }
    
    public function postIndex(Requests\ContentRequest $r)
    {
        $this->picture($r);
        $cont = collect($r->all());
        if(!$cont['url']) {
            $cont['url'] = Transliteration::clean_filename($cont['title']);
        } else {
            $cont['url'] = Transliteration::clean_filename($cont['url']);
        }
        Content::create($cont->all());//добавляю запись в БД в таблицу Products
        return redirect('/home');//редирект на home
    }
    
    public function getDelete($id)
    {
        Content::where('id',$id)->delete();//удаляю зарись из таблицы Products БД
        return redirect('/home');//редирект на home
    }

    public function getUpdate($id)
    {
        $entery = Content::where('id',$id)->get();//получаю запись с параметром ID из таблицы Products БД
        return view('home_update')->with(['entery'=>$entery[0], 'category'=>$this->category]);//загружаю шаблон home_update
    }

    public function postUpdate(Requests\ContentRequest $r, $id)
    {
        $this->picture($r);
        $cont = collect($r->all());
        $cont->pop();
        if(!$cont['url']) {
            $cont['url'] = Transliteration::clean_filename($cont['title']);
        } else {
            $cont['url'] = Transliteration::clean_filename($cont['url']);
        }
        Content::where('id',$id)->update($cont->all());//обновляю запись с параметром ID в таблице Products БД
        return redirect('/home');//редирект на home
    }

    public function getCreate()
    {
        return view('home_create')->with(['category'=> $this->category]);//загружаю шаблон home_create
    }

    public function getOrders()
    {
        $orders = Order::where('user_id',Auth::user()->id)->orderBy('id','desc')->get();
        return view('home_orders')->with(['orders'=> $orders->all()]);//загружаю шаблон home_orders
    }

    public function getOrder($id)
    {
        $order = Order::where(['user_id'=>Auth::user()->id,'id'=>$id])->first();
        $tov = $this->cook_arr($order->zakaz);
        //dd($order);
        return view('home_order')->with(['order'=> $order, 'tov'=>$tov]);//загружаю шаблон home_order
    }

    public function picture(&$r)
    {
        $pict = Input::file('picture1');
        $dir = '/media/uploads/';
        $time = time();
        $pic = \App::make('\App\Libs\ImagesClass')->urlGet($pict, $dir, $time);
        if($pic) {
            $r['img'] = $pic;
        }
    }
    public function cook_arr($cook){
        $big_arr = explode(',',$cook);
        foreach($big_arr as $k=>$v) {
            $lit_arr = explode(':',$v);
            if($lit_arr[0]!=null){
                $tov[$lit_arr[0]] = Content::find($lit_arr[0]);
                $tov[$lit_arr[0]]['count'] = $lit_arr[1];
            }
        }
        return $tov;
    }

}
