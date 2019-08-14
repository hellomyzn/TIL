@extends('layouts.helloapp')

@section('title', 'Index')

@section('menubar')
    @parent
    index page
@endsection

@section('content')
    <p>Main</p>
    <p>You can write something</p>
        
        @include('components.message', ['msg_title'=>'OK', 'msg_content'=>'sab manu'])

        @component('components.message')
            @slot('msg_title')
            CAUTION!
            @endslot

            @slot('msg_content')
                これはメッセージの表示
            @endslot
        @endcomponent


        @each('components.item', $data, 'item')
@endsection


@section('footer')
    copyright 2017 tuyano.
@endsection

