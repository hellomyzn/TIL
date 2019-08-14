<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title></title>
</head>
<body>
    <h1>Blade/for break</h1>
    <p>for break </p>
    <ol>
        @for ($i = 1; $i < 100; $i++)
        @if ($i % 2 == 1)
            @continue
        @elseif ($i <= 10)
            <li>No, {{$i}}</li>
        @else
            @break
        @endif
        @endfor

    </ol>
</body>
</html>
