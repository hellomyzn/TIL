<?php 

use App\Http\Controllers\Simablog\SimablogPostController;
use App\Http\Controllers\serviceRepositoryPattern\ServiceRepositoryPatternPostController;
use Illuminate\Support\Facades\Route;

Route::group([
        'as' => 'post.'
], function (){
    Route::resource('post', ServiceRepositoryPatternPostController::class, [
        'only' => ['index','show', 'create', 'store'],
        'names' => [
            'index' => 'index',
            'show' => 'show',
            'create' => 'create',
            'store' => 'store'       
        ]
    ]);
    Route::get('posts/edit/{id}', [ServiceRepositoryPatternPostController::class, 'edit'])->name('edit');
    Route::post('posts/edit',[ServiceRepositoryPatternPostController::class, 'update'])->name('update');
    Route::post('posts/delete/{id}', [ServiceRepositoryPatternPostController::class, 'destroy'])->name('delete');
});