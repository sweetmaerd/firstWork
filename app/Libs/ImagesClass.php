<?php
/**
 * Created by PhpStorm.
 * User: SRZAI
 * Date: 31.08.16
 * Time: 21:31
 */

namespace App\Libs;

use Image;
use Illuminate\Support\Facades\Auth;


class ImagesClass {
    public function __construct() {

    }

    public function urlGet($path = null,$dir = null, $name = null) {
        if($path != null){
            $filename = $name.".jpg";
            $dir =  public_path().$dir;
            //dd($dir);
            if(!file_exists($dir)) {
                mkdir($dir, 0777, true);
            }
            //большая картинка
            $img = Image::make($path);
            $img->resize(990,null,function($con) {
               $con->aspectRatio();
            });
            $img->save($dir.$filename);

            //малая картинка
            $img = Image::make($path);
            $img->resize(150,null,function($con) {
               $con->aspectRatio();
            });
            $img->save($dir.'s_'.$filename);

            return $filename;
        } else {
            return false;
        }
    }

} 