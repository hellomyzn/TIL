<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\IndexController;
use App\Http\Controllers\PostController;


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

    Route::get('/', [IndexController::class, 'index' ])->name('index');

    Route::resource('posts', PostController::class)->only(['create','store']);

    Route::get('users/1', function(){
        return view('pages.user.show');
    })->name('users.show');

});

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
