<?php

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Auth::routes();

Route::group(['middleware'=>'auth'], function () {
    Route::get('logout', 'HomeController@logout');
    Route::get('/', 'HomeController@index');
    Route::get('classes', 'ClassesController@index');
    Route::post('classes', 'ClassesController@search');
});
Route::namespace('Api')->group(function () {
    Route::get('/api/shake', 'HomeController@subscribe');
    Route::group(['prefix'=> 'api', 'middleware'=>'handshoken'], function () {
        Route::get('/classes', 'ClassesController@index');

    });
});

