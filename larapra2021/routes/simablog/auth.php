<?php

use App\Http\Controllers\Simablog\Auth\LoginController;
use App\Http\Controllers\Simablog\Auth\RegisterController;
use App\Http\Controllers\Simablog\Auth\ForgotPasswordController;
use App\Http\Controllers\Simablog\Auth\ResetPasswordController;
use Illuminate\Support\Facades\Route;
use Spatie\YamlFrontMatter\YamlFrontMatter;

Route::group([
    'as'            => 'auth.',
], function () {
    Route::get('members/login', [LoginController::class,'showLoginForm'])->name('login');
    Route::post('members/login', [LoginController::class,'login']);
    Route::post('members/logout', [LoginController::class,'logout'])->name('logout');
    
    Route::get('members/register', [RegisterController::class,'showRegistrationForm'])->name('register');
    Route::post('members/register', [RegisterController::class,'register'])->name('register.store');
    
    Route::get('members/password/reset', [ForgotPasswordController::class,'showLinkRequestForm'])->name('password.request');
    Route::post('members/password/email', [ForgotPasswordController::class,'sendResetLinkEmail'])->name('password.email');
    Route::get('members/password/reset/{token}', [ForgotPasswordController::class,'showResetForm'])->name('password.reset');
    Route::post('members/password/reset', [ForgotPasswordController::class,'reset']);
}
);    
