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
    Route::get('test', function () {
        $start = \Carbon\Carbon::now()->startOfWeek()->format('Ymd');
        $end = \Carbon\Carbon::now()->endOfWeek()->format('Ymd');
        $client = new GuzzleHttp\Client();
        $content = collect();
        foreach (\App\Classes::all() as $class) {
            $res = $client->Request('GET', 'https://roosters.deltion.nl/api/roster?group='.$class->name.'&start=' . $start . '&end=' . $end, ['verify' => false]);
            $content->push(json_decode($res->getBody()));
            $data = json_decode($res->getBody())->data;
        }
        dd($content);
    });
});

