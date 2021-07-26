<?php

use App\Models\laracasts\LaracastsUser;
use App\Models\laracasts\LaracastsPost;
use App\Models\laracasts\LaracastsCategory;
use App\Http\Controllers\Laracasts\LaracastsPostController;
use App\Http\Controllers\Laracasts\LaracastsRegisterController;
use App\Http\Controllers\Laracasts\SessionsController;
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

Route::get('register', [LaracastsRegisterController::class, 'create'])->middleware('guest');
Route::post('register', [LaracastsRegisterController::class, 'store'])->middleware('guest');
Route::post('logout', [SessionsController::class, 'destroy']);