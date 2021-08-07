<?php

use App\Http\Controllers\Simablog\Auth\SimablogLoginController;
use App\Http\Controllers\Simablog\Auth\SimablogRegisterController;
use Illuminate\Support\Facades\Route;
use Spatie\YamlFrontMatter\YamlFrontMatter;

Route::group([
    'middleware' => 'guest'
], function () {
    Route::get('login', [SimablogLoginController::class, 'showLoginForm'])->name('show-login-form');
    Route::post('login', [SimablogLoginController::class, 'login'])->name('login');

    Route::get('register', [SimablogRegisterController::class, 'showRegistrationForm'])->name('show-register-form');
    Route::post('register', [SimablogRegisterController::class, 'register'])->name('register');
});

Route::group([
    'middleware' => 'auth'
], function () {
    Route::get('logout', [SimablogLoginController::class, 'logout'])->name('logout');
});