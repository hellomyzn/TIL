<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title></title>
</head>
<body>
    <h1>IF</h1>
    @if($msg != '')
        <p>こんにちは {{$msg}} san</p>
    @else
        <p>Write something</p>
    @endif
        <form action="/hello/ifif" method="POST">
            {{ csrf_field() }}
            <input type="text" name="msg">
            <input type="submit">
        </form>
</body>
</html>
