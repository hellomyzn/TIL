<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title></title>
</head>
<body>
    <h1>Form</h1>
    <p>{{ $msg  }}</p>
    <form action="/hello" method="POST">
        {{ csrf_field() }}
        <input type="text" name="msg">
        <input type="submit">
    </form>
</body>
</html>
