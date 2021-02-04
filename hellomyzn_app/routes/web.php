<?php

use Illuminate\Support\Facades\Route;

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
Auth::routes();


# For don't allow to access the pages without login
Route::group(['middleware' => ['auth']], function(){

    Route::get('/', 'IndexController@index')->name('index');

    Route::get('posts/create', function(){
        return view('pages.post.create');
    })->name('posts.create');

    Route::get('users/1', function(){
        return view('pages.user.show');
    })->name('users.show');

});

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
