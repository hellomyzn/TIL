<?php

use App\Http\Controllers\Ilumukita\Auth\IlumukitaLoginController;
use App\Http\Controllers\Ilumukita\Auth\IlumukitaRegisterController;
use App\Http\Controllers\Ilumukita\DashboardController;
use Illuminate\Support\Facades\Route;
use Spatie\YamlFrontMatter\YamlFrontMatter;

Route::group([
    'middleware' => 'auth',
    'as' => 'dashboard.',
    'prefix' => 'dashboard'
], function () {
    Route::get('/', [DashboardController::class, 'index'])->name('home');
});