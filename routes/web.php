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

Route::get('/databrick_1_result', 'MapController@dataBrick1');
Route::get('/databrick_2_result', 'MapController@dataBrick2');
Route::get('/databrick_3_result', 'MapController@dataBrick3');

Route::get('/spark_1_result', 'MapController@spark1');
Route::get('/spark_2_result', 'MapController@spark2');
Route::get('/spark_3_result', 'MapController@spark3');

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