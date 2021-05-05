<?php

use App\Models\post;
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
    
    // Find a post by its slug and pass it to a view called "post"

    $post = Post::find($slug); 
    
    logger("welcome to laracasts/post/$slug page");
    return view('laracasts.post', ['post' => $post]);
});
