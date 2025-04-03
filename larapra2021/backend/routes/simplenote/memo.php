<?php

use App\Http\Controllers\Simplenote\Memo\SimplenoteMemoContoller;
use Illuminate\Support\Facades\Route;

Route::group([
    'middleware' => 'auth',
    'as' => 'memos.'
], function () {
    Route::resource('memo', SimplenoteMemoContoller::class, 
    [
        'only' => ['index', 'create', 'store', 'edit', 'update', 'destroy'],
        'names' => [
            'index' => 'home',
            'create' => 'create',
            'store' => 'store',
            'edit' => 'edit',
        ],
    ]);
    Route::post('edit/{memo}', [SimplenoteMemoContoller::class, 'update'])->name('update');
    Route::post('delete/{memo}', [SimplenoteMemoContoller::class, 'destroy'])->name('destroy');
});