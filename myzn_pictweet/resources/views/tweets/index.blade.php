@extends('layout')

@section('content')
<div class="contents row">
    @foreach($tweets as $tweet)
        <div class="content_post" style="background-image: url({{ $tweet->image }});">
            <div class="more">
                <span>
                    <img src="/images/arrow_top.png" alt="">
                </span>
                <ul class="more_list">
                    <li><a href="/tweets/{{ $tweet->id }}">More</a></li>
                    <li><a href="/tweets/{{ $tweet->id }}/edit">Edit</a></li>
                    <li><a href="/tweets/{{ $tweet->id }}" onclick="event.preventDefault(); document.getElementById('delete_{{ $tweet->id }}').submit();">Delete</a></li>
                    {{ Form::open(['url' => "/tweets/{$tweet->id}", 'method' => 'delete', 'id' => "delete_{$tweet->id}"]) }}
                    {{ Form::close() }}

                </ul>
            </div>
            <p>{{ $tweet->text  }}</p>
            <span class="name">
                    <a href="">
                        <span>User</span>{{ App\User::find($tweet->user_number)->name }}
                    </a>
            </span>
        </div>
    @endforeach

    {{ $tweets->links()  }}
</div>
@endsection
