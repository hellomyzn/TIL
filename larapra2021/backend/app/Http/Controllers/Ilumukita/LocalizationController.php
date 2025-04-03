<?php

namespace App\Http\Controllers\Ilumukita;

use App\Http\Controllers\Controller;

class LocalizationController extends Controller
{
    /**
     * Handle the incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function __invoke($language = 'en')
    {
        request()->session()->put('locale', $language);
        return redirect()->back();
    }
}
