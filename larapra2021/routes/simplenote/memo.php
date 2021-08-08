<?php

use App\Http\Controllers\Simplenote\Memo\SimplenoteMemoContoller;
use Illuminate\Support\Facades\Route;

Route::group([
    'middleware' => 'auth',
    'as' => 'memos.'
], function () {
    Route::resource('memo', SimplenoteMemoContoller::class, 
    [
        'only' => ['index', 'create', 'store'],
        'names' => [
            'index' => 'home',
            'create' => 'create',
            'store' => 'store',
        ],
    ]);
});