<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class hello_for_single extends Controller
{
    public function __invoke(){

        return <<< EOF
    <html>
    <head> 
    <title>hello/invoke</title>
    <style>
        body {font-size:16px; color:#999; }
        h1 {font-size:100px; text-align:right; color:#eee; margin:-40px 0px -50px 0px;}
    </style>
    </head>
    <body>
        <h1>Single Action</h1>
        <p>This is single action page of Hello Controller</p>
    </body>
    </html>
EOF;
    }
}
