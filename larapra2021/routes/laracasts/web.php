<?php

use App\Models\laracasts\LaracastsPost;
use Illuminate\Support\Facades\Route;
use Spatie\YamlFrontMatter\YamlFrontMatter;


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
    $posts = LaracastsPost::all();
    logger('welcome to laracasts/posts page');
    return view('laracasts.posts', ['posts' => $posts]);
});


Route::get('post/{post}', function($id){
    $post = LaracastsPost::find($id); 
    
    logger("welcome to laracasts/post/$id page");
    return view('laracasts.post', ['post' => $post]);
});
