<?php

use App\Models\laracasts\LaracastsUser;
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
    $posts = LaracastsPost::latest('published_at');
    $categories = LaracastsCategory::all();
    logger('welcome to laracasts/posts page');

    if (request('search')){
        $posts
            ->where('title', 'like', '%' . request('search') . '%')
            ->orWhere('body', 'like', '%' . request('search') . '%');
    }
    // dd($posts);
    // Check how many sql were run
    // \Illuminate\Support\Facades\DB::listen(function ($query){
    //     logger($query->sql, $query->bindings);
    // });
    
    return view('laracasts.posts', ['posts' => $posts->get(), 'categories' => $categories]);
})->name('laracasts.home');


Route::get('post/{post:slug}', function(LaracastsPost $post){
    
    logger("welcome to laracasts/post/$post->id page");
    return view('laracasts.post', ['post' => $post]);
});


Route::get('categories/{category:slug}', function(LaracastsCategory $category){
    $posts = $category->laracasts_posts;
    $categories = LaracastsCategory::all();
    $currentCategory = $category;

    logger("welcome to laracasts/categories/$category->slug page");
    return view('laracasts.posts', ['posts' => $posts, 'categories' => $categories, 'currentCategory' => $currentCategory ]);
})->name('laracasts.category');


Route::get('users/{user:username}', function(LaracastsUser $user){
    $posts = $category->laracasts_posts;
    $categories = LaracastsCategory::all();

    logger("welcome to laracasts/user/$user->name page");
    return view('laracasts.posts', ['posts' => $posts, 'categories' => $categories]);
});