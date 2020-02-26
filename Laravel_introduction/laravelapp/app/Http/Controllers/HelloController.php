<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests\HelloRequest;
use Validator;


class HelloController extends Controller
{
    //
    public function index(Request $request)
    {
        return view('Hello.index', ['msg'=>'Fill up the form']);
    }


    public function post(HelloRequest $request)
    {
        return view('hello.index', ['msg' => 'Success']);
    }
}
