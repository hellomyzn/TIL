@extends('layout')

@section('content')
<div class="container">
    <h1>MONTHLY DIALY FORM</h1>
    <form action="/monthly" method="post">
        {{ csrf_field() }}
        <input type="text" name="text">
        <input type="submit" value="SENT">
    </form>
</div>
@endsection

