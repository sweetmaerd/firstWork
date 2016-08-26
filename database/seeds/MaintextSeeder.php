<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
//use DB;
class MaintextSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('maintexts')->insert([
            'name'=>'Добро пожаловать на сайт',
            'body'=>'Текст',
            'url'=>'index'
        ]);
    }
}
