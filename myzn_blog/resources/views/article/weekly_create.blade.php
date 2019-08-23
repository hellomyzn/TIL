@extends('layout')

@section('contente')
<div class="container">
    <h1>WEEKLY DIALY FORM</h1>
    <form action="/weekly" method="post">

        {{ csrf_field() }}
        <input type="text" name="text">
        <input type="submit" value="SENT">
    </form>
</div>



@endsection
