<?php 

use App\Http\Controllers\Simablog\SimablogPostController;
use App\Http\Controllers\serviceRepositoryPattern\ServiceRepositoryPatternController;
use Illuminate\Support\Facades\Route;

Route::group([
        'as' => 'post.'
], function (){
    Route::resource('post', ServiceRepositoryPatternController::class, [
        'only' => ['index','show', 'create', 'store'],
        'names' => [
            'index' => 'index',
            'show' => 'show',
            'create' => 'create',
            'store' => 'store'       
        ]
    ]);
    Route::get('posts/edit/{id}', [ServiceRepositoryPatternController::class, 'edit'])->name('edit');
    Route::post('posts/edit',[ServiceRepositoryPatternController::class, 'update'])->name('update');
    Route::post('posts/delete/{id}', [ServiceRepositoryPatternController::class, 'destroy'])->name('delete');
});