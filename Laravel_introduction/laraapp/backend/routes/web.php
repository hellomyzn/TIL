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

# Section 1
Route::get('/', function () {
    return view('welcome');
});

Route::get('hello', function(){
    return "hello";
});


# Section 2

// Route::get('hello/{hoge}', function($hoge){
//     return $hoge;
// });

Route::get('hello/{id}/{slug?}', function($id, $slug='Nothing'){
    return "{$id}, {$slug}";
});

Route::get('hellocontroller/{id?}/{pass?}', "HelloController@index");

Route::get('oneaction', 'OneActionController');

Route::get('reqandres', "HelloController@index_req_and_res");
