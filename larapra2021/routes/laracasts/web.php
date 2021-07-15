<?php

use App\Models\laracasts\LaracastsPost;
use App\Models\laracasts\LaracastsCategory;
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

    // Check how many sql were run
    \Illuminate\Support\Facades\DB::listen(function ($query){
        logger($query->sql, $query->bindings);
    });
    return view('laracasts.posts', ['posts' => $posts]);
});


Route::get('post/{post:slug}', function(LaracastsPost $post){
    
    logger("welcome to laracasts/post/$post->id page");
    return view('laracasts.post', ['post' => $post]);
});


Route::get('categories/{category:slug}', function(LaracastsCategory $category){
    $posts = LaracastsCategory::all();
    logger("welcome to laracasts/categories/$category page");
    return view('laracasts.posts', ['posts' => $category->laracasts_posts]);
});