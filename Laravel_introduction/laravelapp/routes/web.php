<?php

use App\Http\Middleware\HelloMiddleware;

/* |--------------------------------------------------------------------------
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

Route::get('hello/pphhpp', 'HelloController@pphhpp');

Route::get('hello/section', 'HelloController@section');

Route::get('hello/middle', 'HelloController@middle')->middleware(HelloMiddleware::class);
Route::get('hello/response', 'HelloController@response')->middleware(HelloMiddleware::class);


Route::get('hello/global', 'HelloController@global');

Route::get('hello/groupe', 'HelloController@groupe')->middleware('helo');


Route::get('hello/validate_hoge', 'HelloController@validate_hoge');
Route::post('hello/validate_post', 'HelloController@validate_hoge_post');

Route::post('hello/validate_request', 'HelloController@validate_request');

Route::post('hello/validator_hoge', 'HelloController@validator_hoge');
Route::post('hello/validator_costom', 'HelloController@validator_costom');

Route::get('hello/cookie_index', 'HelloController@cookie_index');
Route::post('hello/cookie_post', 'HelloController@cookie_post');


Route::get('hello/db_index', 'HelloController@db_index');
Route::get('hello/add', 'HelloController@add');

Route::post('hello/add', 'HelloController@db_create');


Route::get('/hello/{id?}/{pass?}', 'HelloController@index');
