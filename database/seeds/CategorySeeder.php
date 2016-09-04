<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class CategorySeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('categories')->insert([

            [
                'name'=>'News',
                'alias'=>'',
                'description'=>'News',
                'created_at'=>date('Y.m.d H:i:s')

            ],
            [
                'name'=>'News',
                'alias'=>'Hot',
                'description'=>'News/Hot',
                'created_at'=>date('Y.m.d H:i:s')

            ],
            [
                'name'=>'Albums',
                'alias'=>'EP',
                'description'=>'Albums/EP',
                'created_at'=>date('Y.m.d H:i:s')

            ],
            [
                'name'=>'Albums',
                'alias'=>'Single',
                'description'=>'Albums/Singe',
                'created_at'=>date('Y.m.d H:i:s')

            ],
            [
                'name'=>'Albums',
                'alias'=>'Album',
                'description'=>'Albums/Album',
                'created_at'=>date('Y.m.d H:i:s')

            ],
            [
                'name'=>'Groups',
                'alias'=>'Belarussian',
                'description'=>'Groups/Belarussian',
                'created_at'=>date('Y.m.d H:i:s')

            ],
            [
                'name'=>'Groups',
                'alias'=>'SNG',
                'description'=>'Groups/SNG',
                'created_at'=>date('Y.m.d H:i:s')

            ],
            [
                'name'=>'Groups',
                'alias'=>'World',
                'description'=>'Groups/World',
                'created_at'=>date('Y.m.d H:i:s')

            ],
            [
                'name'=>'Concerts',
                'alias'=>'',
                'description'=>'Concerts',
                'created_at'=>date('Y.m.d H:i:s')
            ],
            [
                'name'=>'Photos',
                'alias'=>'',
                'description'=>'Photos',
                'created_at'=>date('Y.m.d H:i:s')
            ],
    ]);
    }
}
