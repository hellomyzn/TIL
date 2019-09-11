<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class Deepbreath extends Controller
{
    public function index()
    {
        return view('deepbreath.index');
    }
}
