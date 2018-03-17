@extends('layout')

@section('content')
<div class="contents row">
  <div class="container">
    {{ Form::open(['url' => '/tweets', 'method' => 'post']) }}
      <h3>投稿する</h3>
      <input type="text" name="image" value="" placeholder="Image Url">
      <textarea name="text" rows="10" cols="30" placeholder="text"></textarea>
      <input type="submit" name="" value="SENT">
    {{ Form::close() }}
  </div>

</div>
@endsection
