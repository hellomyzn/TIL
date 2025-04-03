<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
</head>
<body>
    <h1>{{ $msg }}</h1>
    <form action="/hello/index_request" method='post'>
        @csrf
        MSAGE: <input type="text" name="msg"> <br>
        MAIL: <input type="text" name="mail"> <br>
        TELL: <input type="text" name="tel"> <br>
        <input type="submit"> <br>
    </form>
    <ol>
        @for ($i = 0; $i < count($keys); $i++)
            <li> {{ $keys[$i] }} : {{ $values[$i]}} </li>
        @endfor
    </ol>
</body>
</html>
