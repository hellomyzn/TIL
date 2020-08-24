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

Route::get('hello', function(){
    return "hello";
});

// Route::get('hello/{hoge}', function($hoge){
//     return $hoge;
// });

Route::get('hello/{id}/{slug?}', function($id, $slug='Nothing'){
    return "{$id}, {$slug}";
});
