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
*/


//Route::group(['middleware' => ['web']], function () {
//
//    Route::get('/', function () {
//       return view('welcome');
//    });
//
//});

//Route::get('/', function() {
//   return view('welcome');
//});

Route::group(['namespace' => 'Home'], function() {

    Route::get('/', 'IndexController@index');
    Route::get('article/{article_id}', 'IndexController@article');

});

Route::group(['namespace'=>'Admin', 'prefix' => 'admin'], function () {

    Route::any('/', 'LoginController@login');
    Route::any('login', 'LoginController@login');
    Route::any('captcha', 'LoginController@captcha');

});


Route::group(['middleware' => 'AdminLogin','namespace'=>'Admin', 'prefix' => 'admin'], function () {


    Route::get('index', 'IndexController@index');
    Route::get('info', 'IndexController@info');
    Route::get('quit', 'IndexController@quit');
    Route::any('changePass','IndexController@changePass');

    Route::resource('category','CategoryController');
    Route::post('cate/changeorder', 'CategoryController@changeOrder');

    Route::resource('article', 'ArticleController');

    Route::get('upload','UserController@avatar');
    Route::post('upload', 'UserController@avatarUpload');


});





