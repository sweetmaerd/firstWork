<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Content;
use App\Order;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;
use Event;
use App\Events\AddEmail;

class BasketController extends Controller
{
    public $tov=[];
    static public $count=0;

    public function getIndex(){
        //if($status=='good')
        $tov = self::cook_arr();
        return view('basket')->with(['tov'=>$tov]);
    }

    public function postAdd($id=null){
        return ($this->getDeleted($id,$_POST['count'],false));

    }

    public function getAdded($count,$id=null){
        $this->tov[$id] = $count;
        self::cook_add($this->tov,$id);
        return redirect('/basket');
    }

    public function cook_add($tov=[],$id){
        $str = self::checkCookie();
        foreach($tov as $k_id=>$count) {//устанавливаем COOKIE
            $str .= $k_id.':'.$count.',';
        }
        setCookie('basket', $str,time()+3600,'/');
    }

    static public function cook_arr(){
        $cook = self::checkCookie();
        if(!$cook) {
            setcookie('counts','0',time()+3600,'/');
            return 0;
        };
        $big_arr = explode(',',$cook);
        foreach($big_arr as $k=>$v) {
            $lit_arr = explode(':',$v);
            if($lit_arr[0]!=null){
                $tov[$lit_arr[0]] = Content::find($lit_arr[0]);
                $tov[$lit_arr[0]]['count'] = $lit_arr[1];
                self::$count += 1;
            }
        }
        setcookie('counts',self::$count,time()+3600,'/');

        return $tov;
    }

    public function getDeleted($id=null,$count = null,$red=TRUE) {
        $str = self::checkCookie();
        $big_arr = explode(',',$str);
        $strco = '';
        foreach($big_arr as $key=>$v) {
            $lit_arr = explode(':',$v);
            if($lit_arr[0] == $id or $lit_arr[0] == null){
                unset($big_arr[$key]);
            }
        }
        foreach($big_arr as $key=>$v){
            $strco .= $v.',';
        }
        //dd($strco);
        setCookie('basket', $strco,time()+3600,'/');
        if($red) {
            return redirect('/basket');
        } else {
            return redirect('/basket/added/'.$count.'/'.$id);
        }
    }

    public static function checkCookie() {
        return (isset($_COOKIE['basket']))?$_COOKIE['basket']:'';
    }
    public function postBuy(Requests\OrderRequest $r) {
        $arr = $r->all();
        $arr['counts'] = $_COOKIE['counts'];
        Order::insert($arr);
        setcookie('basket',null,time()-1,'/');
        Event::fire(new AddEmail($arr['user_id'],' сделал заказ №',Order::where('user_id',$arr['user_id'])->first()));
        return redirect('/');
    }

}
