<?php 

use App\Http\Controllers\Auth\LoginController;

Route::group([
    'middleware' => 'guest'
], function () {
    Route::get('login', [LoginController::class, 'showLoginForm'])->name('login');
});

Route::group([
    'middleware' => 'auth'
], function () {
    Route::get('logout', function(){
        return "logout";
    });
});