<?php 

use App\Http\Controllers\Simablog\SimablogPostController;
use App\Http\Controllers\ServiceRepositoryPattern\ServiceRepositoryPatternPostController;
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
    Route::get('post/edit/{post}', [ServiceRepositoryPatternPostController::class, 'edit'])->name('edit');
    Route::post('post/edit/{post}',[ServiceRepositoryPatternPostController::class, 'update'])->name('update');
    Route::post('post/delete/{post}', [ServiceRepositoryPatternPostController::class, 'destroy'])->name('delete');
});