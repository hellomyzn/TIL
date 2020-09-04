<?php

namespace App\Http\Controllers\Sample;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class SampleController extends Controller
{
    public function index(Request $request){
        $msg = 'Sample Controller Index';
        return view('sample.index', compact('msg'));
    }
}
