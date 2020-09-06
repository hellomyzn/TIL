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


# Section 1

Route::get('hello/', 'HelloController@index');

Route::get('/hello/index_name', 'HelloController@index_name')->name('HI');
Route::get('/hello/other', "HelloController@index_other");

Route::get('hello/index_id/{id}', 'HelloController@index_id')->where('id', '[0-9]+');
Route::get('hello/index_hello', 'HelloController@index_hello')->middleware('hello');
Route::get('hello/index_bye', 'HelloController@index_bye')->middleware('hello');

Route::namespace('Sample')->group(function() {
    Route::get('/sample', "SampleController@index");
    Route::get('sample/index_config', 'SampleController@index_config');
});

Route::get('hello/index_model/{person}', 'HelloController@index_model');

Route::get('hello/index_config', 'HelloController@index_config');
