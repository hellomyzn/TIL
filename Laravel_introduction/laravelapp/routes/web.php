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

Route::get('/single', 'SingleController');
Route::get('/hello/request_and_response', 'HelloController@request_and_response');
Route::get('/other', 'HelloController@other');
Route::get('/hello', function(){
    return view('hello.index');
});

Route::get('hello2', 'HelloController@index2');
Route::get('/hello/{id?}/{pass?}', 'HelloController@index');
