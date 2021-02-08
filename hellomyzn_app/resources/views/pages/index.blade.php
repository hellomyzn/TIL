@extends('layouts.app')

@section('content')
    <div class="p-index">

        {{-- <? dd($posts); ?> --}}
        @foreach ($posts as $post)
        <div class="c-post-block">
            <div class="post">
              <div class="name">
                <a href="{{ route('users.show', $post->user->id ) }}">
                    <img src={{ $post->user->logo_url}} class="profile-img"/>
                    <p>
                        {{ $post->user->name }}
                    </p>
                </a>
              </div>
              <img src="https://image.flaticon.com/icons/svg/149/149947.svg" class="detail-img"/>
            </div>

            <div class="post-image">
              <img src="{{ $post->img_url }}" width="100%"/>
            </div>

            <div class="likes">
                <div class="left-icons">
                    <img src="https://image.flaticon.com/icons/svg/25/25424.svg"/>
                    <img src="https://image.flaticon.com/icons/svg/54/54916.svg"/>
                    <img src="https://image.flaticon.com/icons/svg/126/126536.svg"/>
                </div>
                <img src="https://image.flaticon.com/icons/svg/25/25667.svg"/>
            </div>

            <div class="like-count">
                <img src="https://image.flaticon.com/icons/svg/60/60993.svg"/>
                <p>24 likes</p>
            </div>

            <div class="comments">
                <!-- auth user comment -->
                <p>
                    <span class="user-name">{{ $post->user->name }}</span>
                    {{ $post->description }}
                </p>
                <!-- user comment -->

                <p>
                    <span class="user-name">test1</span>
                    hahaha
                </p>

                <p>
                    <span class="user-name">test2</span>
                    hahaha
                </p>
            </div>

            <div class="comment-input">
                <form action={{ route('comments.store') }} method="POST">
                    @csrf
                    <input type="hidden" name="post_id" value={{ $post->id }}>
                    <input type="text" name="comment" placeholder="Comment">
                    <button class="btn btn-link">
                        投稿する
                    </button>
                </form>
            </div>
        </div>

        @endforeach
        <!-- c-post-blockで投稿をハードコードしているので不要なc-post-blockを削除し、c-post-blockをforeachする -->

    </div>
@endsection
