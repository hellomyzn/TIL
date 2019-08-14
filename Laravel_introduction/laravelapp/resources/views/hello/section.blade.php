@extends('layouts.helloapp')

@section('title', 'Index')

@section('menubar')
    @parent
    index page
@endsection

@section('content')
    <p>Main</p>
    <p>You can write something</p>
@endsection


@section('footer')
    copyright 2017 tuyano.
@endsection

