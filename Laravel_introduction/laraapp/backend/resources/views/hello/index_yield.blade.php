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
@endsection


@section('footer')
    copyright 2017 Eiji
@endsection
