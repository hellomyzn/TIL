<?php

use App\Http\Controllers\Blogcrud\BlogcrudRegisterController;
use App\Http\Controllers\Blogcrud\BlogcrudLoginController;
use Illuminate\Support\Facades\Route;
use Spatie\YamlFrontMatter\YamlFrontMatter;

Route::group([
    'middleware' => 'guest'
], function () {
    Route::get('login', [BlogcrudLoginController::class, 'showLoginForm'])->name('show-login-form');
    Route::post('login', [BlogcrudLoginController::class, 'login'])->name('login');

    Route::get('register', [BlogcrudRegisterController::class, 'showRegistrationForm'])->name('show-register-form');
    Route::post('register', [BlogcrudRegisterController::class, 'register'])->name('register');
});

Route::group([
    'middleware' => 'auth'
], function () {
    Route::get('logout', [BlogcrudLoginController::class, 'logout'])->name('logout');
});
    

