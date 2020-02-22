<body>
    <h1>Blade/continue</h1>
    <p>break</p>
    <ol>
        @for ($i = 1; $i < 100; $i++)
            @if($i % 2 == 1)
                @continue
            @elseif ($i <= 10)
                <li>No, {{$i}}</li>
            @else
                @break
            @endif
        @endfor
    </ol>
</body>
