@extends('layout')

@section('content')
  <div class="contents row">
    <h2><strong>{{ $name }}</strong>'s posts</h2>
    @foreach($tweets as $tweet)
      <div class="content_post" style="background-image: url({{ $tweet->image }});">
        <div class="more">
          <span><img src="/images/arrow_top.png"></span>
          <ul class="more_list">
            <li><a href="/tweets/{{ $tweet->id }}">More</a></li>
            @if(Auth::check() && Auth::user()->id == $tweet->user_number)
              <li><a href="/tweets/{{ $tweet->id }}/edit">Edit</a></li>
              <li><a href="/tweets/{{ $tweet->id }}" onclick="event.preventDefault(); document.getElementById('delete_{{ $tweet->id }}').submit();">Delete</a></li>
              {{ Form::open(['url' => "/tweets/{$tweet->id}", 'method' => 'delete', 'id' => "delete_{$tweet->id}"]) }}
              {{ Form::close() }}
            @endif
          </ul>
        </div>

        <p>{{ $tweet->text }}</p>
        <span class="name">
          <a href="#">
            <span>User</span>{{ $name }}
          </a>
        </span>
      </div>
    @endforeach

    {{ $tweets->links() }}
  </div>
@endsection
