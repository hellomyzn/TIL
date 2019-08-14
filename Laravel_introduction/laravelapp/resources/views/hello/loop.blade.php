<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title></title>
</head>
<body>
    <h1>Blade/loop</h1>
    <p>loop </p>
    <ol>
        @foreach($data as $item)
        @if($loop->first)
        <p>all datas</p>
        <ul>
        @endif
            <li>No, {{$loop->iteration}}. {{$item}}</li>
        @if ($loop->last)
            
            <ul>
                <p>------------ここまで</p>
            </ul>
        @endif
        @endforeach
    </ol>
</body>
</html>
