<?php

use App\Http\Controllers\Blogcrud\BlogcrudPostsController;

Route::group(
    [
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
                'store' => 'store'       
            ],
        ]);
    }
);