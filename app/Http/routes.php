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

Route::group(['prefix' => 'messages'], function () {
    Route::get('/', ['as' => 'messages', 'uses' => 'MessagesController@index']);
    Route::get('create', ['as' => 'messages.create', 'uses' => 'MessagesController@create']);
    Route::get('real/{id}', ['as' => 'messages.real', 'uses' => 'MessagesController@real']);
    Route::post('/', ['as' => 'messages.store', 'uses' => 'MessagesController@store']);
    Route::get('{id}', ['as' => 'messages.show', 'uses' => 'MessagesController@show']);
    Route::put('{id}', ['as' => 'messages.update', 'uses' => 'MessagesController@update']);
});

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


