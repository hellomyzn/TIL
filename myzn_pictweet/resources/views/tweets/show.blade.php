@extends('layout')

@section('content')
<div class="contents row">
  <div class="content_post" style = "background-image: url( {{ $tweet->image }} );">
    <div class="more">
      <span>
        <img src="/images/arrow_top.png" alt="">
      </span>
      <ul class="more_list">
        <li>
          <a href="/tweets/{{ $tweet->id}}">詳細</a>
        </li>
        @if (Auth::user()->id == $tweet->user->id)
          <li>
            <a href="/tweets/{{ $tweet->id }}/edit">編集</a>
          </li>
          <li>
            <a href="/tweets/{{ $tweet->id }}"　data-method="delete">削除</a>
          </li>
        @endif
      </ul>
    </div>
    <p>{{$tweet->text}}</p>
    <span class="name">
      <a href="#"><span>投稿者</span>{{Auth::user()->name}}</a>
    </span>
  </div>
  <div class="container">
    @if (Auth::check())
      {{ Form::open([ 'url' => "/tweets/{$tweet->id}/comments"]) }}
        <textarea name="text" rows="2" cols="30" placeholder="コメントする"></textarea>
        <input type="submit" name="" value="SENT">
      {{ Form::close() }}
    @endif
    <div class="comments">
      <h4><コメント一覧></h4>
      @foreach($comments as $comment)
        <p>
          <strong><a href="/users/{{ $comment->user_id }}">{{ $comment->user->name }}</a>:</strong>
          {{ $comment->text }}
        </p>
      @endforeach
    </div>
  </div>
</div>
@endsection
