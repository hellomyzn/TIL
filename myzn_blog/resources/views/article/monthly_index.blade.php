@extends('layout')


@section('content')
<div class="container">INDEX_MONTHLY
     <p>{{ $text }}</p>

    @foreach( $monthlies as $monthly )
        <p>{{ $monthly->title }}</p>
        <p>{{ $monthly->text }}</p>
    @endforeach
</div>
@endsection
