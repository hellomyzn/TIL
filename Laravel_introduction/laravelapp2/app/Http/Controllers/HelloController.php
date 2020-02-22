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


    public function root_parameter($id='zero')
    {
        $data = [
            'msg' => 'the message is from controller',
            'id' => $id
        ];

        return view('hello.root_paramater', $data);
    }


    public function query(Request $request)
    {
        $data = [
            'msg' => 'You recived the message from Controller',
            'id' => $request->id
        ];
        return view('hello.query', $data);

    }


    public function blade()
    {
        $data = [
            'msg' => 'This is used by blade file',
        ];
        return view('hello.blade', $data);
    }

    public function post(Request $request)
    {
        $msg = $request->msg;
        $data = [
            'msg'=> 'hello ' . $msg . ' san! ',
        ];
        return view('hello.blade', $data);
    }


    public function at_if()
    {
        return view('hello.at_if', ['msg'=>'']);
    }

    public function post_at_if(Request $request)
    {
        return view('hello.at_if', ['msg'=>$request->msg]);
    }


    public function isset()
    {
        return view('hello.is_set');
    }

    public function isset_post(Request $request)
    {
        return view('hello.is_set', ['$msg'=>$request->msg]);
    }


    public function foreach_test()
    {
        $data = ["a", "b", "c", "d", 'e'];
        return view("Hello.foreach_test", ['data' => $data]);
    }
}

