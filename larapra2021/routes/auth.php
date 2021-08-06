<?php 

use App\Http\Controllers\Auth\LoginController;
use App\Http\Controllers\Blogcrud\BlogcrudRegisterController;

Route::group([
    'middleware' => 'guest'
], function () {
    Route::get('login', [LoginController::class, 'showLoginForm'])->name('show-login-form');
    Route::post('login', [LoginController::class, 'login'])->name('login');

    Route::get('register', [BlogcrudRegisterController::class, 'showRegistrationForm'])->name('show-register-form');
    Route::post('register', [BlogcrudRegisterController::class, 'register'])->name('register');
});

Route::group([
    'middleware' => 'auth'
], function () {
    Route::get('logout', [LoginController::class, 'logout'])->name('logout');
});