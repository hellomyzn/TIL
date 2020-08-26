@for ($i = 0; $i < 100; $i++)
    @if ($i % 2 == 1)
        @continue
    @elseif($i <= 10)
        <li>No, {{ $i }}</li>
    @else
        @break
    @endif
@endfor
