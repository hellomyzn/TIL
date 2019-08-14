<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title></title>
</head>
<body>
    <h1>IS SET</h1>
    @isset($msg)
        <p>こんにちは {{$msg}} san</p>
    @else
        <p>Write something</p>
    @endisset
        <form action="/hello/isset" method="POST">
            {{ csrf_field() }}
            <input type="text" name="msg">
            <input type="submit">
        </form>
</body>
</html>
