<?php

use App\Http\Controllers\Blogcrud\BlogcrudPagesController;

Route::group([
        'as' => 'page.'
    ], function (){
        Route::get('pages', [BlogcrudPagesController::class, 'index'])->name('index');
    }
);