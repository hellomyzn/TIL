@extends('layouts.hello')

@section('title', "yeild")

@section('menubar')
    @parent
    <li>Yeild parent1</li>
    <li>Yeild parent2</li>
@endsection


@section('content')
    <p>This is Yield page</p>
    <p>hogehogehoge</p>

    @component('components.message')
        @slot('msg_title')
        Hello This is component title
        @endslot

        @slot('msg_content')
        This is message from component
        @endslot


    @endcomponent


@endsection



@section('footer')
    copyright 2017 Eiji
@endsection
