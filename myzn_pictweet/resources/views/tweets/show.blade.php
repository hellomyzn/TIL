@extends('layout')

@section('content')
<div class="contents row">
  <div class="content_post" style="background-image: url({{ $tweet->image }});">
    @if(Auth::check() && Auth::user()->id == $tweet->user_number )
        <div class="more">
          <span><img src="/images/arrow_top.png"></span>
          <ul class="more_list">
            <li><a href="/tweets/{{ $tweet->id }}/edit">Edit</a></li>
            <li><a href="/tweets/{{ $tweet->id }}" onclick="event.preventDefault(); document.getElementById('delete_{{ $tweet->id }}').submit();">Delete</a></li>
            {{ Form::open(['url' => "/tweets/{$tweet->id}", 'method' => 'delete', 'id' => "delete_{$tweet->id}"]) }}
            {{ Form::close() }}
          </ul>
        </div>
    @endif

    <p>{{ $tweet->text }}</p>
    <span class="name">
      <a href="#">
        <span>User</span>{{ App\User::find($tweet->user_number)->name }}
      </a>
    </span>
  </div>
</div>
@endsection
