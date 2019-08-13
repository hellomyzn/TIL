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
