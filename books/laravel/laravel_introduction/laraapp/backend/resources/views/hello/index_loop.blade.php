@foreach ($people as $person)
    {{ $person }}<br>
    This is loop->iteration: {{ $loop->iteration }}<br>
    This is loop->index: {{ $loop->index }}<br>
    This is loop->remaining: {{ $loop->remaining }}<br>
    This is loop->count: {{ $loop->count }}<br>
    This is loop->first: @if($loop->first) True @else False @endif<br>
    This is loop->last: @if($loop->last) True @else False @endif<br>
    @foreach ($people as $person2)
        ------------------------------{{ $person2 }} <br>
        ------------------------------This is loop->depth: {{ $loop->depth }}<br>


    @endforeach
    <br>
@endforeach
