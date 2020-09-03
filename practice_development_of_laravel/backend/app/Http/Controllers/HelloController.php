<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class HelloController extends Controller
{

    # Section1

    public function index(){
        $data = [
            'msg' => 'This is sample message from hello Controller',
        ];

        return view('hello.index', compact('data'));
    }

    public function index_name(){
        return view('hello.index_name');
    }

    public function index_other(){
        return redirect()->route('HI');
    }
}
