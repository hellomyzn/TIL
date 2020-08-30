@extends('layouts.hello')

@section('title', "yeild")

@section('menubar')
    @parent
    Yield page
@endsection


@section('content')
    <p>Paragraph</p>
    <p>hogehogehoge</p>
@endsection


@section('footer')
        copyright 2017 Eiji
@endsection
