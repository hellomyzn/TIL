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


// # Section 3

// Route::get("hello/php-template", "HelloController@index_php");
// Route::get("hello/php-template/{id?}", "HelloController@index_php_refer");
// Route::get("hello/query", "HelloController@index_query");
// Route::get("hello/index_blade", "HelloController@index_blade");
// Route::get("hello/index_form", "HelloController@index_form");
// Route::post('hello', "HelloController@post");

// Route::get('hello/index_if', "HelloController@index_if");
// Route::post('hello/index_if', "HelloController@index_if");
// Route::get('hello/index_unless', "HelloController@index_unless");
// Route::post('hello/index_unless', "HelloController@index_unless");
// Route::get("hello/index_empty", "HelloController@index_empty");
// Route::post('hello/index_empty', "HelloController@index_empty");
// Route::get("hello/index_isset", "HelloController@index_isset");
// Route::post("hello/index_isset", "HelloController@index_isset");

// Route::get("hello/index_for", "HelloController@index_for");
// Route::get("hello/index_foreach", "HelloController@index_foreach");
// Route::get("hello/index_forelse", "HelloController@index_forelse");
// Route::get("hello/index_while", "HelloController@index_while");
// Route::get("hello/index_break", "HelloController@index_break");
// Route::get("hello/index_continue", "HelloController@index_continue");
// Route::get("hello/index_loop", "HelloController@index_loop");
// Route::get("hello/index_php_directive", "HelloController@index_php_directive");

// # Section 4
// Route::get("hello/index_yield", "HelloController@index_yield");
// Route::get('hello/index_provider', "HelloController@index_provider");
// Route::get('hello/index_composer', "HelloCOntroller@index_composer");

# Section 5
Route::get('hello/index_middleware', 'HelloController@index_middleware')->middleware('hello');
Route::get('hello/index_middleware_response','HelloController@index_middleware_response')->middleware('hello.response');
Route::get('hello/index_middleware_helo', 'HelloController@index_middleware')->middleware('helo');
Route::get('hello/index_middleware_response_helo','HelloController@index_middleware_response')->middleware('helo');

Route::get('hello/index_validate', 'HelloController@index_validate');
Route::post('hello/index_validate', 'HelloController@post_validate');

Route::get('hello/index_request', 'HelloController@index_request');
Route::post('hello/index_request', 'HelloController@post_request');

Route::get('hello/index_validator', 'HelloController@index_validator');
Route::post('hello/index_validator', 'HelloController@post_validator');
