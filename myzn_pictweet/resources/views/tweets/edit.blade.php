@extends('layout')

@section('content')
<div class="contents row">
  <div class="container">
    {{ Form::open(['url' => "tweets/$tweet->id", 'method' => 'patch']) }}
      <h3>編集する</h3>
      <input type="text" name="image" value="{{ $tweet->image}}" autofocus="true" placeholder="Image Url">
      <textarea name="text" rows="10" cols="30" placeholder="text">{{ $tweet->text }}</textarea>
      <input type="submit" name="" value="SENT">
    {{ Form::close() }}
  </div>

</div>
@endsection
