@extends('layouts.hello')

@section('content')
This is middleware
@foreach ($data as $item)
    <li>{{ $item['name']}}: {{ $item['mail']}}</li>
@endforeach

@endsection
