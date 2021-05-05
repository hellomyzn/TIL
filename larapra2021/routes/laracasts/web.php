<?php

use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Laracasts / Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', function(){
    logger('welcome to laracasts/welcome page');
    return view('laracasts.welcome');
});

Route::get('posts', function(){
    logger('welcome to laracasts/posts page');
    return view('laracasts.posts');
});

Route::get('post', function(){
    logger('welcome to laracasts/post page');
    return view('laracasts.post', [
        'post' => '<h1>Hello World</h1>'
    ]);
});
