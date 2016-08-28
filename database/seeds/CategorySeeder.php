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
            'name'=>'Albums',
            'alias'=>'EP',
            'description'=>'Категория Albums//EP',
            'created_at'=>date('Y.m.d H:i:s')
            
        ],
        [
            'name'=>'Albums',
            'alias'=>'Single',
            'description'=>'Категория Albums/Singe',
            'created_at'=>date('Y.m.d H:i:s')
            
        ],
        [
            'name'=>'Albums',
            'alias'=>'Album',
            'description'=>'Категория Albums/Album',
            'created_at'=>date('Y.m.d H:i:s')
                              
        ],
        [
            'name'=>'Groups',
            'alias'=>'Belarussian',
            'description'=>'Категория Groups/Belarussian',
            'created_at'=>date('Y.m.d H:i:s')
                              
        ],
        [
            'name'=>'Groups',
            'alias'=>'SNG',
            'description'=>'Категория Groups/SNG',
            'created_at'=>date('Y.m.d H:i:s')
                             
        ],
        [
            'name'=>'Groups',
            'alias'=>'World',
            'description'=>'Категория Groups/World',
            'created_at'=>date('Y.m.d H:i:s')
            
        ],
        [
            'name'=>'News',
            'alias'=>'Hot',
            'description'=>'Категория News/Hot',
            'created_at'=>date('Y.m.d H:i:s')
            
        ],
        [
            'name'=>'News',
            'alias'=>'',
            'description'=>'Категория News',
            'created_at'=>date('Y.m.d H:i:s')
            
        ],
        [
            'name'=>'Concerts',
            'alias'=>'',
            'description'=>'Категория Concerts',
            'created_at'=>date('Y.m.d H:i:s')
        ],
        [
            'name'=>'Photos',
            'alias'=>'',
            'description'=>'Категория Photos',
            'created_at'=>date('Y.m.d H:i:s')                               
        ],
    ]);
    }
}
