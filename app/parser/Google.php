<?php
namespace App\Parser;
use Symfony\Component\DomCrawler\Crawler;
use App\Content;

class Google implements ParseContract {
    
    public function __construct(){
        set_time_limit(0);
        header('Content-Type:text/HTML;churset=utf-8');
    }
    
    public function getParse($data){
        foreach($data as $one){
            $str=str_replace(' ','+',$one->title);
            $ff = 'http://www.google.by/search?q='.$str.'&sourceid=chrome&ie=UTF-8';
            $file = file_get_contents($ff);
            $crawler = new Crawler($file);
            $count = $crawler->filter('.rg_ic')->count();
            dd($count);
            if($count==0){
                $ttr='-';
            } else {
                $ttr = $crawler->filter('.images_table img')->eq(0)->attr('src');
            }
            echo $ttr.'<br>';
            sleep(1);
            $prod = Product::find($one->id);
            $prod->img = $ttr;
            $prod->save();
        }
    }
    
    
}