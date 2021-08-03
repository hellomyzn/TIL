<?php

use App\Http\Controllers\Blogcrud\BlogcrudPagesController;

Route::get('/',[BlogcrudPagesController::class, 'home'])->name('home');

Route::group([
        'as' => 'page.'
    ], function (){
        Route::get('pages', [BlogcrudPagesController::class, 'index'])->name('index');
    }
);