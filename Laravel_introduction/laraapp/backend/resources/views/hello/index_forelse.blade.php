@forelse ($people as $person)
    {{ $person }} <br>
@empty
    $people is empty
@endforelse
