<?php

namespace App\Http\Controllers;

use App\Http\Requests;
use App\Content;
use App\User;
use App\Category;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Input;
use Event;
use App\Events\AddEmail;
use App\Order;
use That0n3guy\Transliteration\Facades\Transliteration;



class HomeController extends Controller
{

    protected $category;
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
        $content = Content::paginate(); //применяю пагиницию для контента
        //Event::fire(new AddEmail(Auth::user()->id,'Привет. Посмотри, может найдешь что-то интересное'));
        return view('home')->with(['category'=> $this->category, 'content'=>$content]);//загружаю шаблон home
    }
    
    public function postIndex(Requests\ContentRequest $r)
    {
        $this->picture($r);
        $content = collect($r->all());
        if(!$content['url']) {
            $content['url'] = Transliteration::clean_filename($content['title']);
        } else {
            $content['url'] = Transliteration::clean_filename($content['url']);
        }
        Content::create($content->all());//добавляю запись в БД в таблицу Products
        return redirect('/home');//редирект на home
    }

    /**
     * @param $id
     * @return \Illuminate\Http\RedirectResponse|\Illuminate\Routing\Redirector
     */
    public function getDelete($id)
    {
        $img = Content::where('id',$id)->first();
        if($img->img != 'default.jpg') {
            $this->delImg($img->img);
        }
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
        $this->picture($r);//если пришла картинка, то обрабатываем её
        $content = collect($r->all());
        //роверяю пришла ли картинка при обновлении записи
        //dd($content);

        if(isset($content['picture1'])){
            $img = Content::where('id',$id)->first();
            if($img->img != 'default.jpg') {
                $this->delImg($img->img);
            }
            $content->pop();//удаляем ненужную строку
        }
        if(!$content['url']) {
            $content['url'] = Transliteration::clean_filename($content['title']);
        } else {
            $content['url'] = Transliteration::clean_filename($content['url']);
        }
        Content::where('id',$id)->update($content->all());//обновляю запись с параметром ID в таблице Products БД
        return redirect('/home');//редирект на home
    }


    public function postCreate(Requests\ContentRequest $r)
    {
        $this->picture($r);
        $cont = collect($r->all());
        if(isset($cont['picture1'])){
            $cont->pop();
        }
        //dd($cont);
        if(!$cont['url']) {
            $cont['url'] = Transliteration::clean_filename($cont['title']);
        } else {
            $cont['url'] = Transliteration::clean_filename($cont['url']);
        }
        Content::insert($cont->all());//обновляю запись с параметром ID в таблице Products БД
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
        if($pict = Input::file('picture1')){
            $dir = '/media/uploads/';
            $time = time();
            $pic = \App::make('\App\Libs\ImagesClass')->urlGet($pict, $dir, $time);
            if($pic) {
                $r['img'] = $pic;
            }
        }
        return;
    }


    public function delImg($img) {
        $path = public_path().'/media/uploads/';
        $filename = $path.$img;
        $filename_s = $path.'s_'.$img;
        if(file_exists($filename)){
            unlink($filename);
            if(file_exists($filename_s)){
                unlink($filename_s);
            }
            return 'файл удален:'.$img;
        };
        return 'что-то пошло не так';
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
