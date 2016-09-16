<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('users')->insert([
            'name'=>'admin',
            'email'=>'admin@admin.com',
            'role_id'=>'1',
            'password'=>'$2y$10$e9nNcjYBsc/2s6Q/FyLEXO4P9c5E2JM2yxSJqe/TlTUUcocXAAg9q',
            'created_at'=>date('Y.m.d H:i:s')
        ]);
    }
}
