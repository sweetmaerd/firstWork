<?php

/*
|--------------------------------------------------------------------------
| Application Routes
|--------------------------------------------------------------------------
|
| Here is where you can register all of the routes for an application.
| It's a breeze. Simply tell Laravel the URIs it should respond to
| and give it the controller to call when that URI is requested.
|

Route::get('/', function ($page) {
    return view('index');
})

Route::get('user/profile', [
  'as' => 'profile', 'uses' => 'BaseController@showProfile'
]);
*/
Route::get('/home', 'HomeController@index');
Route::controllers([
    '/products'=>'ProductController',
    '/post' => 'HomeController',
    '/auth'=>'Auth\AuthController',
    '/home'=>'HomeController',
    'crud'=>'BaseController',
    '{page?}'=>'BaseController',
]);



Route::auth();


