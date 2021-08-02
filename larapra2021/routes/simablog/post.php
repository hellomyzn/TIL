<?php 

use App\Http\Controllers\Simablog\SimablogPostController;
use Illuminate\Support\Facades\Route;
use Spatie\YamlFrontMatter\YamlFrontMatter;

Route::group([
        'as' => 'post.'
], function (){
    Route::resource('posts', SimablogPostController::class, [
        'only' => ['index','show', 'create', 'store'],
        'names' => [
            'index' => 'index',
            'show' => 'show',
            'create' => 'create',
            'store' => 'store'       
        ]
    ]);
    Route::get('posts/edit/{id}', [SimablogPostController::class, 'edit']);
    Route::post('posts/edit',[SimablogPostController::class, 'update']);
    Route::post('posts/delete/{id}', [SimablogPostController::class, 'destroy']);
});