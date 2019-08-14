<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Http\Response;

class HelloController extends Controller
{
    //
    public function index($id='noname', $pass='unknown')
    {
        return <<<EOF
<html>
<body>
<h1>Index</h1>
<p>This is Hello Controller</p>
<ul>
    <li>ID : {$id}</li>
    <li>PASS : {$pass}</li>
</ul>
</body>
</html>
EOF;
    }


    public function index2(Request $request)
    {
        $data = [
            'msg' => 'This is Message from Hello Controller',
            'id' => $request->id,
        ];
        return view('hello.index2', $data);
    }

    public function index3()
    {
        $data = [
            'msg' => 'This is Message from Hello Controller with using blade',
        ];

        return view('hello.index3', $data);
    }

    public function form()
    {
        $data = [
            'msg' => 'This is Form page',
        ];

        return view('hello.form', $data);
    }

    public function post(Request $request)
    {
        $msg = $request->msg;
        $data = [
            'msg'=>'hello'.$msg.'san!',
        ];
        return view('hello.index3', $data);
    }

    public function ifif(Request $request)
    {
        return view('hello.if', ['msg'=>$request->msg]);
    }

    public function isisset(Request $request)
    {
        return view('hello.isset', ['msg'=>$request->msg]);
    }

    public function forfor()
    {
        $data = ['one', 'two', 'three', 'four', 'five'];
        return view('hello.forfor', ['data'=>$data]);
    }


    public function forbreak()
    {
        return view('hello.forbreak');
    }

    public function loop()
    {

        $data = ['one', 'two', 'three', 'four', 'five'];
        return view('hello.loop', ['data'=>$data]);
    }

    public function pphhpp()
    {
        $data = ['one', 'two', 'three', 'four', 'five'];
        return view('hello.pphhpp', ['data'=>$data]);

    }

    public function section()
    {
        $data = [
            ['name' => "hoge", 'mail'=>'hoge@hoge'],
            ['name' => "fuge", 'mail'=>'fuge@fuge'],
            ['name' => "piyo", 'mail'=>'piyo@piyo'],
        ];
        return view('hello.section', ['data'=>$data]);
    }

    public function other(){
        return <<<EOF
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title></title>
</head>
<body>
    <h1>Other</h1>
    <p>This is other</p>
</body>
</html>
EOF;
    }


    public function request_and_response(Request $request, Response $response)
    {
        return <<<EOF
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title></title>
</head>
<body>
    <h1>Request and Response</h1>
    <h3>Request</h3>
    <pre>{$request}</pre>

    <h3>Response</h3>
    <pre>{$response}</pre>


</body>
</html>
EOF;
    }
}
