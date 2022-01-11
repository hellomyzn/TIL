<?php

use App\Http\Controllers\Ilumukita\LocalizationController;

Route::get('/localization/{language}', LocalizationController::class)->name('localization.switch');