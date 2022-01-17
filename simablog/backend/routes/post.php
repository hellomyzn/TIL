<?php

use Illuminate\Support\Facades\Route;
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

Route::group([
    'as' => 'posts.'
],function(){
    Route::resource('posts', PostController::class, [
        'only' => ['index', 'show', 'create', 'store'],
        'names' => [
            'index'=> 'index',
            'show'=> 'show',
            'create'=> 'create',
            'store'=> 'store'
        ]
    ]);
    Route::get('posts/edit/{id}', [PostController::class, 'edit'])->name('edit');
    Route::post('posts/edit',[PostController::class, 'update'])->name('update');
    Route::post('posts/delete/{id}', [PostController::class, 'destroy'])->name('delete');
});