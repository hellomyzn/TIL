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
                    <li><a href="/tweets/{{ $tweet->id }}/edit">編集</a></li>
                </ul>
            </div>
            <p>{{ $tweet->text  }}</p>
            <span class="name">
                    <a href="">
                        <span>投稿者</span>{{ $tweet->name }}
                    </a>
            </span>
        </div>
    @endforeach

    {{ $tweets->links()  }}
</div>
@endsection
