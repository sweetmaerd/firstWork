<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class ContentSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('contents')->insert([
            'title'=>'Добро пожаловать на сайт',
            'description'=>'Первая статья на сайте firstwork by Ivan',
            'url'=>'Добро пожаловать на сайт',
            'categories_id'=>'News',
            'author'=>'Ivan',
            'created_at'=>date('Y.m.d H:i:s'),
	    'img' => 'default.jpg'
        ]);
    }
}
