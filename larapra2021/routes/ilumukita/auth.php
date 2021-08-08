<?php

use App\Http\Controllers\Ilumukita\Auth\IlumukitaLoginController;
use App\Http\Controllers\Ilumukita\Auth\IlumukitaRegisterController;
use App\Http\Controllers\Ilumukita;
use Illuminate\Support\Facades\Route;
use Spatie\YamlFrontMatter\YamlFrontMatter;

Route::group([
    'middleware' => 'guest'
], function () {
    Route::get('login', [IlumukitaLoginController::class, 'showLoginForm'])->name('show-login-form');
    Route::post('login', [IlumukitaLoginController::class, 'login'])->name('login');

    Route::get('register', [IlumukitaLoginController::class, 'showRegistrationForm'])->name('show-register-form');
    Route::post('register', [IlumukitaLoginController::class, 'register'])->name('register');
});

Route::group([
    'middleware' => 'auth'
], function () {
    Route::post('logout', [IlumukitaLoginController::class, 'logout'])->name('logout');
});