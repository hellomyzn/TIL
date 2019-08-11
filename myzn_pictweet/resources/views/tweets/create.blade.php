@extends('layout')

@section('content')
<div class="content row">
    <div class="container">

        {{ Form::open(['url' => 'tweets', 'method' => 'post']) }}
            <h3>Post</h3>
            <input type="text" name="image" placeholder="Image Url">
            <textarea id="" name="text" cols="30" rows="10" placeholder="Text"></textarea>
            <input type="submit" value="SENT">
        {{ Form::close() }}
    </div>
</div>

@endsection
