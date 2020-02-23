@extends('layouts.helloapp')

@section('title', 'Index')

@section('menubar')
    @parent
    Index Page
@endsection


@section('content')
    <p>This is contents</p>

    @each('components.item', $data, 'item')
    <p>You can write here</p>

    @component('components.message')
        @slot('msg_title')
            CAUTION!
        @endslot

        @slot('msg_content')
            displying the messages
        @endslot
    @endcomponent

    @include('components.message', ['msg_title'=>'OK', 'msg_content'=>'sub view'])

    <p>This is contents</p>
    <p>Controller value <br>'message' = {{$message}}</p>
    <p>ViewComposer value <br>'view_message' = {{$view_message}}</p>
@endsection

@section('footer')
    copyright 2017
@endsection

