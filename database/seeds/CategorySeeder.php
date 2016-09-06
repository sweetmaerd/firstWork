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
                'parent_id' =>'0',
                'alias'=>'News',
                'created_at'=>date('Y.m.d H:i:s')
            ],
            [
                'name'=>'Albums',
                'parent_id' =>'0',
                'alias'=>'Albums',
                'created_at'=>date('Y.m.d H:i:s')

            ],
            [
                'name'=>'Belarussian',
                'parent_id' =>'0',
                'alias'=>'Belarussian',
                'created_at'=>date('Y.m.d H:i:s')

            ],
            [
                'name'=>'Concerts',
                'parent_id' =>'0',
                'alias'=>'Concerts',
                'created_at'=>date('Y.m.d H:i:s')
            ],
            [
                'name'=>'Photos',
                'parent_id' =>'0',
                'alias'=>'Photos',
                'created_at'=>date('Y.m.d H:i:s')
            ],
            [
                'name'=>'Hot',
                'parent_id' =>'1',
                'alias'=>'News/Hot',
                'created_at'=>date('Y.m.d H:i:s')

            ],
            [
                'name'=>'EP',
                'parent_id' =>'2',
                'alias'=>'Albums/EP',
                'created_at'=>date('Y.m.d H:i:s')

            ],
            [
                'name'=>'Singe',
                'parent_id' =>'2',
                'alias'=>'Albums/Singe',
                'created_at'=>date('Y.m.d H:i:s')

            ],
            [
                'name'=>'Album',
                'parent_id' =>'2',
                'alias'=>'Albums/Album',
                'created_at'=>date('Y.m.d H:i:s')

            ],
            [
                'name'=>'Groups',
                'parent_id' =>'3',
                'alias'=>'Groups/Belarussian',
                'created_at'=>date('Y.m.d H:i:s')

            ],
            [
                'name'=>'SNG',
                'parent_id' =>'3',
                'alias'=>'Groups/SNG',
                'created_at'=>date('Y.m.d H:i:s')

            ],
            [
                'name'=>'World',
                'parent_id' =>'3',
                'alias'=>'Groups/World',
                'created_at'=>date('Y.m.d H:i:s')

            ],
    ]);
    }
}
