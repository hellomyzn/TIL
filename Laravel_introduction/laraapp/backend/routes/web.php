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

// # Section 1
// Route::get('/', function () {
//     return view('welcome');
// });

// Route::get('hello', function(){
//     return "hello";
// });


// # Section 2

// // Route::get('hello/{hoge}', function($hoge){
// //     return $hoge;
// // });

// Route::get('hello/{id}/{slug?}', function($id, $slug='Nothing'){
//     return "{$id}, {$slug}";
// });

// Route::get('hello/hello/{id?}/{pass?}', "HelloController@index");

// Route::get('oneaction', 'OneActionController');

// Route::get('hello/reqandres', "HelloController@index_req_and_res");


# Section 3

Route::get("hello/php-template", "HelloController@index_php");
Route::get("hello/php-template/{id?}", "HelloController@index_php_refer");
Route::get("hello/query", "HelloController@index_query");
Route::get("hello/index_blade", "HelloController@index_blade");
Route::get("hello/index_form", "HelloController@index_form");
Route::post('hello', "HelloController@post");

Route::get('hello/index_if', "HelloController@index_if");
Route::post('hello/index_if', "HelloController@index_if");
Route::get('hello/index_unless', "HelloController@index_unless");
Route::post('hello/index_unless', "HelloController@index_unless");
Route::get("hello/index_empty", "HelloController@index_empty");
Route::post('hello/index_empty', "HelloController@index_empty");
Route::get("hello/index_isset", "HelloController@index_isset");
Route::post("hello/index_isset", "HelloController@index_isset");
