@extends('layouts.hello')

@section('content')
    <p>{{ $session_data}}</p>
    <form action="/hello/index_session" method="post">
        {{ csrf_field()}}
        <input type="text" name='input'>
        <input type="submit" value='send'>
    </form>
@endsection
