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
Route::get('hello3', 'HelloController@index3');
Route::get('hello/form', 'HelloController@form');
Route::post('hello', 'HelloController@post');
Route::get('hello/ifif', 'HelloController@ifif');
Route::post('hello/ifif', 'HelloController@ifif');

Route::get('hello/isset', 'HelloController@isisset');
Route::post('hello/isset', 'HelloController@isisset');

Route::get('hello/forfor', 'HelloController@forfor');

Route::get('hello/forbreak', 'HelloController@forbreak');

Route::get('hello/loop', 'HelloController@loop');

Route::get('/hello/{id?}/{pass?}', 'HelloController@index');
