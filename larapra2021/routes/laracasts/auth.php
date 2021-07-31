<?php

use App\Http\Controllers\Laracasts\LaracastsRegisterController;
use App\Http\Controllers\Laracasts\SessionsController;
use Illuminate\Support\Facades\Route;
use Spatie\YamlFrontMatter\YamlFrontMatter;

Route::get('register', [LaracastsRegisterController::class, 'create'])->middleware('guest');
Route::post('register', [LaracastsRegisterController::class, 'store'])->middleware('guest');

Route::get('login', [SessionsController::class, 'create'])->middleware('guest');
Route::post('login', [SessionsController::class, 'store'])->middleware('guest');

Route::post('logout', [SessionsController::class, 'destroy'])->middleware('auth');