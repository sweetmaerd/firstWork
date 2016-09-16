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
    '/basket'=>'BasketController',
    '/ajax'=>'AjaxController',
    '/content'=>'ContentController',
    '/post' => 'HomeController',
    '/auth'=>'Auth\AuthController',
    '/home'=>'HomeController',
    '/{page?}'=>'BaseController'
]);



Route::auth();


