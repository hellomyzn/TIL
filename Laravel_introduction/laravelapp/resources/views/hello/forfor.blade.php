<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title></title>
</head>
<body>
    <h1>Blade/for</h1>
    <p>for for </p>
    <ol>
        @foreach($data as $item)
        <li>{{ $item }}</li>
        @endforeach
    </ol>
</body>
</html>
