@extends('layout')

@section('content')

<div class="container">
    <h1>DAILY DIALY FORM</h1>
    <form action="/daily" method="post" enctype="multipart/form-data">
        {{ csrf_field() }}
        <label for="title">TITLE</label><br>
        <input type="text" name="title" id="title"><br><br>

        <label for="date">DATE</label><br>
        <input type="date", name="date"><br><br>

        <label for="text">TEXT</label><br>
        <input type="text" name="text" id="text"><br><br>

        <label for="picture">PICTURE</label><br>
        <input type="file" name="picture" id="picture"><br><br>

        <input type="submit" value="SENT">
    </form>
</div>


@endsection
