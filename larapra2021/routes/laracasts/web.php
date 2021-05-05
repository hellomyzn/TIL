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

Route::get('post/{post}', function($slug){    
    $path = __DIR__ . "/../../resources/posts/$slug.html";

    if (! file_exists($path)) {
        logger("laracasts/post/$slug page is not exist");
        // ddd("hoge");
        abort(404);
    }

    logger("welcome to laracasts/post/$slug page");
    $post = file_get_contents($path);

    return view('laracasts.post', [
        'post' => $post
    ]);
});
