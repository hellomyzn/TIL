<?php

use App\Http\Controllers\Blogcrud\PagesController;

Route::group([
        'as' => 'page'
    ], function (){
        Route::get('index', [PagesController::class, 'index'])->name('index');
    }
);