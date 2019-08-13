<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class SingleController extends Controller
{
    //
    public function __invoke()
    {
        return <<<EOL
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title></title>
</head>
<body>
    <h1>Single</h1>
    <p>This is single action controller</p>
</body>
</html>
EOL;
    }
}
