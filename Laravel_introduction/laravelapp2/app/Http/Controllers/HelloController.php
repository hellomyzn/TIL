<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Http\Response;

class HelloController extends Controller
{
    //
    public function index(){
        return <<< EOF
    <html>
    <head> 
    <title>hello/index</title>
    <style>
        body {font-size:16px; color:#999; }
        h1 {font-size:100px; text-align:right; color:#eee; margin:-40px 0px -50px 0px;}
    </style>
    </head>
    <body>
        <h1>Index</h1>
        <p>This is Index page of Hello Controller</p>
    </body>
    </html>
EOF;
    }


    public function index_with_parameter($id='noname', $pass='unknown'){
        return <<<EOF
    <html>
    <head> 
    <title>hello/index_with_parameter</title>
    <style>
        body {font-size:16px; color:#999; }
        h1 {font-size:100px; text-align:right; color:#eee; margin:-40px 0px -50px 0px;}
    </style>
    </head>
    <body>
        <h1>Index with parameter</h1>
        <p>This is Index with parameter page of Hello Controller</p>
        <ul>
            <li>{$id}</li>
            <li>{$pass}</li>
        </ul>
    </body>
    </html>
EOF;
    }


    public function index_response(Request $request, Response $response){
    $html = <<<EOF
    <html>
    <head> 
    <title>hello/response</title>
    <style>
        body {font-size:16px; color:#999; }
        h1 {font-size:100px; text-align:right; color:#eee; margin:-40px 0px -50px 0px;}
    </style>
    </head>
    <body>
        <h1>Index with response</h1>
        <p>This is response of Hello Controller</p>
        <h3>Request</h3>
        <pre>{$request}</pre>

        <h3>Response</h3>
        <pre>{$response}</pre>
    </body>
    </html>
EOF;

    $response->setContent($html);
    return $response;

    }


    public function index_template(){
        return view('hello.index');
    }

    public function index_parameter(){
        $data = ['msg' => 'This is value from parameter'];
        return view('hello.parameter', $data);
    }
}
