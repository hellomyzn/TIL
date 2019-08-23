@extends('layout')

@section('content')
    <div class="container">INDEX_weekly
        <p>{{ $text }}</p>
        
        @foreach( $weeklies as $weekly )

        <p>{{ $weekly->title }}</p>
        <p>{{ $weekly->text }}</p>
        @endforeach
    </div>

@endsection
