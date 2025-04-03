@extends('layouts.hello')

@section('css')
    <link href="{{ asset('css/table.css')}}" rel="stylesheet" href="">
    <script src="{{ asset('js/app.js') }}" defer></script>
    <meta name="csrf-token" content="{{ csrf_token() }}">

@endsection


@section('content')
    @if (Auth::check())
        <p>User: {{$user->name}}</p>
        <p>Mail: {{$user->email}}</p>

    @else
        <p>Not yet login <a href="/login">Login</a></p>
        <a href="/register">Register<a>

    @endif
@endsection
