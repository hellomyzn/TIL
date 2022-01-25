<?php

use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\DB;

use App\Http\Controllers\MemoController;
use App\Models\User;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::group([
    'middleware' => 'auth',
    'as' => 'memos.'
],function(){
    Route::resource('memos', MemoController::class, [
        'only' => ['index', 'show', 'create', 'store', 'edit'],
        'names' => [
            'index'=> 'index',
            'show'=> 'show',
            'create'=> 'create',
            'store'=> 'store',
            'edit'=> 'edit'
        ]
    ]);
    Route::post('memos/edit/{memo}', [MemoController::class, 'update'])->name('update');
    Route::post('memos/delete/{memo}', [MemoController::class, 'destroy'])->name('destroy');
});