@extends('layout')

@section('content')
    <div class="contents row">
        <div class="container">
            {{ Form::open(['url' => "/tweets/{$tweet->id}", 'method' => 'patch']) }}
                <h3>編集する</h3>
                <input type="text" name="image" placeholder="Image Url" value="{{ $tweet->image }}">
                <textarea id="" name="text" cols="30" rows="10" placeholder="Text" >{{ $tweet->text }}</textarea>
                <input type="submit" value="SENT">
            {{ Form::close() }}
        </div>
    </div>
@endsection

