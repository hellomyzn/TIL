<?php

use App\Http\Controllers\Blogcrud\BlogcrudRegisterController;
use App\Http\Controllers\Blogcrud\BlogcrudLoginController;
use Illuminate\Support\Facades\Route;
use Spatie\YamlFrontMatter\YamlFrontMatter;


Route::group([
        'namespace'     => 'Auth', 
        'as'            => 'auth.',
    ], function () {
        Route::group(['middleware' => 'guest'], function(){
            Route::get('register', [BlogcrudRegisterController::class, 'create'])->name('register');
            Route::post('register', [BlogcrudRegisterController::class, 'store'])->name('register.store');
            
            Route::get('login', [BlogcrudLoginController::class, 'create'])->name('login');
            Route::post('login', [BlogcrudLoginController::class, 'store'])->name('login.store');
        });
        Route::group(['middleware' => 'auth'], function(){
            Route::post('logout', [BlogcrudLoginController::class, 'destroy'])->name('logout');
        });
    }
);    
    

