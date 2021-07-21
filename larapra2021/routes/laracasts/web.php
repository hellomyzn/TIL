<?php

use App\Models\laracasts\LaracastsUser;
use App\Models\laracasts\LaracastsPost;
use App\Models\laracasts\LaracastsCategory;
use App\Http\Controllers\Laracasts\LaracastsPostController;
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

Route::get('posts', [LaracastsPostController::class, 'index'])->name('laracasts.home');

Route::get('post/{post:slug}', [LaracastsPostController::class, 'show']);

Route::get('users/{user:username}', function(LaracastsUser $user){
    $posts = $category->laracasts_posts;
    $categories = LaracastsCategory::all();

    logger("welcome to laracasts/user/$user->name page");
    return view('laracasts.posts', ['posts' => $posts, 'categories' => $categories]);
});