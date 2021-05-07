<?php

use App\Models\post;
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
    $document = YamlFrontMatter::parseFile(
        resource_path('posts/my-forth-post.html')
    );
    ddd($document);
     

    $posts = Post::all();

    logger('welcome to laracasts/posts page');
    return view('laracasts.posts', ['posts' => $posts]);
});

Route::get('post/{post}', function($slug){
    $post = Post::find($slug); 
    
    logger("welcome to laracasts/post/$slug page");
    return view('laracasts.post', ['post' => $post]);
});
