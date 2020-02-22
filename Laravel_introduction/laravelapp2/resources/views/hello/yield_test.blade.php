@extends('layouts.helloapp')

@section('title', 'Index')

@section('menubar')
    @parent
    Index Page
@endsection


@section('content')
    <p>This is contents</p>
    <p>You can write here</p>
@endsection


@section('footer')
    copyright 2017
@endsection

