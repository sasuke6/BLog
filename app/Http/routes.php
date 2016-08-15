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




Route::group(['namespace'=>'Admin', 'prefix' => 'admin'], function () {


    Route::any('login', 'LoginController@login');
    Route::any('captcha', 'LoginController@captcha');

});


Route::group(['middleware' => 'AdminLogin','namespace'=>'Admin', 'prefix' => 'admin'], function () {


    Route::get('index', 'IndexController@index');
    Route::get('info', 'IndexController@info');
    Route::get('quit', 'IndexController@quit');
    Route::any('changePass','IndexController@changePass');

    Route::resource('category','CategoryController');


});





