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
        <input type="text" name="msg">
        <input type="submit">
    </form>
</body>
</html>
