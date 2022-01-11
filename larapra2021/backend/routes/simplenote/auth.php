<?php

use App\Http\Controllers\Simplenote\Auth\SimplenoteLoginController;
use App\Http\Controllers\Simplenote\Auth\SimplenoteRegisterController;
use Illuminate\Support\Facades\Route;
use Spatie\YamlFrontMatter\YamlFrontMatter;

Route::group([
    'middleware' => 'guest'
], function () {
    Route::get('login', [SimplenoteLoginController::class, 'showLoginForm'])->name('show-login-form');
    Route::post('login', [SimplenoteLoginController::class, 'login'])->name('login');

    Route::get('register', [SimplenoteRegisterController::class, 'showRegistrationForm'])->name('show-register-form');
    Route::post('register', [SimplenoteRegisterController::class, 'register'])->name('register');
});

Route::group([
    'middleware' => 'auth'
], function () {
    Route::post('logout', [SimplenoteLoginController::class, 'logout'])->name('logout');
});