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

    public function index_config(){
        $sample_msg = config('sample.message');
        $sample_data = config('sample.data');

        return view('sample.index_config', compact('sample_msg', 'sample_data'));
    }
}
