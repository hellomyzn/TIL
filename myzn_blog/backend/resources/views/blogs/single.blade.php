@extends('../layouts/main')

<?php $titleTag = htmlspecialchars($post->title); ?>

@section('title', "|  $titleTag" )


@section('content')
    <div class="row">
        <div class="col-md-9 offset-md-2">
            <h1>{{ $post->title}} </h1>
            <p>{{ $post->body }}</p>
            <hr>
            <p>Posted In: {{ $post->category->name }}</p>
        </div>
    </div>

    <div class="row">
        <div class="col-md-8 offset-md-2">
            <h3 class="comment-title">
                <svg width="1em" height="1em" viewBox="0 0 16 16" class="bi bi-chat-left-fill" fill="currentColor" xmlns="http://www.w3.org/2000/svg">
                    <path fill-rule="evenodd" d="M2 0a2 2 0 0 0-2 2v12.793a.5.5 0 0 0 .854.353l2.853-2.853A1 1 0 0 1 4.414 12H14a2 2 0 0 0 2-2V2a2 2 0 0 0-2-2H2z"/>
                </svg>
                {{ $post->comments()->count() }} Comments
            </h3>
            @foreach ($post->comments as $comment)
                <div class="comment">
                    <div class="author-info">
                        <img src="{{ "https://www.gravatar.com/avatar/" . md5(strtolower(trim($comment->email)) ) . "?s=50&d=mp"  }}" alt="" class="author-image">
                        <div class="author-name">
                            <h4>{{ $comment->name }}</h4>
                            <p class="author-time">{{ date('F nS, Y - g:iA', strtotime($comment->created_at))  }}</p>
                        </div>
                    </div>
                    <div class="comment-content">
                        {{ $comment->comment }}
                    </div>
                </div>
            @endforeach
        </div>
    </div>

    <div class="row">
        <div id="comment-form" class="col-md-8 offset-md-2" style="margin-top: 50px;">
            {{ Form::open(['route' => ['comments.store', $post->id], 'method' => 'POST']) }}
                <div class="row">
                    <div class="col-md-6">
                        {{ Form::label('name', "Name:: ") }}
                        {{ Form::text('name', null, ['class' => 'form-control']) }}
                    </div>

                    <div class="col-md-6">
                        {{ Form::label('email', 'Email: ') }}
                        {{ Form::text('email', null, ['class' => 'form-control']) }}
                    </div>

                    <div class="col-md-12">
                        {{ Form::label('comment', 'Comment: ') }}
                        {{ Form::textarea('comment', null, ['class' => 'form-control', 'rows' => 5]) }}

                        {{ Form::submit('Add Comment', ['class' => 'btn btn-success btn-block', 'style' => 'margin-top:15px;']) }}
                    </div>
                </div>
            {{ Form::close()}}
        </div>
    </div>
@endsection()
