<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Http\Response;

class HelloController extends Controller
{
    # Section 2
    public function index($id='no-id', $pass="no-pass"){
        return "{$id}, {$pass}";
    }

    public function index_req_and_res(Request $request, Response $response) {
        return "<h1>This is request</h1><br>
                {$request}<br><br>
                <h1>This is response</h1><br>
                {$response}";
    }


    # Section 3
    public function index_php(){
        return view("hello.index");
    }
}
