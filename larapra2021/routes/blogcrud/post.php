<?php

use App\Http\Controllers\Blogcrud\BlogcrudPostsController;

Route::group(
    [
        'middleware' => 'blogcrud.auth',
        'as' => 'post.'
    ], function ()
    {
        Route::resource('posts', BlogcrudPostsController::class, 
        [
            'only' => ['index','show', 'create', 'store'],
            'names' => [
                'index' => 'index',
                'show' => 'show',
                'create' => 'create',
                'store' => 'store',
            ],
        ]);

        Route::get('edit/{post:slug}', [BlogcrudPostsController::class, 'edit'])->name('edit');
        Route::post('edit/{post:slug}', [BlogcrudPostsController::class, 'update'])->name('update');
        Route::post('delete/{post:slug}', [BlogcrudPostsController::class, 'destroy'])->name('delete');
    }
);