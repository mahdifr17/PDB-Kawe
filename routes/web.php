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

Route::get('/', function () {
    return view('welcome');
});

Route::get('/map', 'MapController@index');


Route::get('/index', function () {
    return view('index');
});

Route::get('/spark_1', function () {
    return view('spark_1');
});

Route::get('/spark_2', function () {
    return view('spark_2');
});
Route::get('/spark_3', function () {
    return view('spark_3');
});