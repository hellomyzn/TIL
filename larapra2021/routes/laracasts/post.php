<?php

use App\Http\Controllers\Laracasts\LaracastsPostController;
use App\Http\Controllers\Laracasts\LaracastsCommentController;
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

Route::group([
    'as' => 'post.',
    'middleware' => 'auth'
], function() {
    Route::get('posts', [LaracastsPostController::class, 'index'])->name('home');
    Route::get('posts/{post:slug}', [LaracastsPostController::class, 'show'])->name('show');
    Route::post('posts/{post:slug}/comments', [LaracastsCommentController::class, 'store'])->name('comment.store');

    Route::get('admin/posts/create', [LaracastsPostController::class, 'create'])->name('create');
});
