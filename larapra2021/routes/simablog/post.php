<?php 

use App\Http\Controllers\Simablog\SimablogPostController;
use Illuminate\Support\Facades\Route;
use Spatie\YamlFrontMatter\YamlFrontMatter;

// Route::resource('posts', 'SimablogPostController', ['only' => ['index','show', 'create', 'store']]);
Route::get('posts/edit/{id}', [SimablogPostController::class, 'edit']);
Route::post('posts/edit',[SimablogPostController::class, 'update']);
Route::post('posts/delete/{id}', [SimablogPostController::class, 'destroy']);
