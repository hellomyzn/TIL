<?php

use App\Http\Controllers\Simblog\Auth\LoginController;
use App\Http\Controllers\Simblog\Auth\RegisterController;
use App\Http\Controllers\Simblog\Auth\ForgotPasswordController;
use App\Http\Controllers\Simblog\Auth\ResetPasswordController;
use Illuminate\Support\Facades\Route;
use Spatie\YamlFrontMatter\YamlFrontMatter;

Route::group([
    'namespace'     => 'Auth', 
    'as'            => 'auth.',
], function () {
    Route::get('members/login', 'Auth\LoginController@showLoginForm')->name('login');
    Route::post('members/login', 'Auth\LoginController@login');
    Route::post('members/logout', 'Auth\LoginController@logout')->name('logout');
    
    Route::get('members/register', 'Auth\RegisterController@showRegistrationForm')->name('register');
    Route::post('members/register', 'Auth\RegisterController@register');
    
    Route::get('members/password/reset', 'Auth\ForgotPasswordController@showLinkRequestForm')->name('password.request');
    Route::post('members/password/email', 'Auth\ForgotPasswordController@sendResetLinkEmail')->name('password.email');
    Route::get('members/password/reset/{token}', 'Auth\ResetPasswordController@showResetForm')->name('password.reset');
    Route::post('members/password/reset', 'Auth\ResetPasswordController@reset');
}
);    
