@extends('../layouts/main');

@section('title', '| View Post')
@section('content')

    <div class="row">
        <div class="col-md-8">
            <h1>{{ $post->title }}</h1>
            <p class="lead">{{ $post->body }}</p>

            <hr>

            <div class="tags">
                @foreach ($post->tags as $tag)
                    <span class="badge badge-secondary"> {{ $tag->name }}</span>

                @endforeach
            </div>

        </div>
        <div class="col-md-4">
            <div class="card">
                <div class="card-body">
                    <dl class="row">
                        <dt class="col-5">URL: </dt>
                        <dd class="col-7"><a href="{{ route('blogs.single', $post->slug) }}"> {{ route('blogs.single', $post->slug) }} </a></dd>
                    </dl>
                    <dl class="row">
                        <dt class="col-5">Category: </dt>
                        <dd class="col-7">{{ $post->category->name }}</dd>
                    </dl>
                    <dl class="row">
                        <dt class="col-5">Create at:</dt>
                        <dd class="col-7">{{ date('M j, Y h:ia', strtotime($post->created_at)) }}</dd>
                    </dl>
                    <dl class="row">
                        <dt class="col-5">Updated at:</dt>
                        <dd class="col-7">{{ date('M j, Y h:ia', strtotime($post->updated_at)) }}</dd>
                    </dl>

                    <hr>
                    <div class="row">

                        <div class="col-sm-6">
                            {!! Html::linkRoute('posts.edit', 'Edit', array($post->id), array('class' => 'btn btn-primary btn-block')) !!}
                        </div>
                        <div class="col-sm-6">
                            {!! Form::open( ['route' => ['posts.destroy', $post->id], 'method' => 'DELETE'] ) !!}
                            {!! Form::submit('Delete', ['class' => 'btn btn-danger btn-block' ]) !!}
                            {!! Form::close() !!}
                        </div>
                    </div>


                    <div class="row">
                        <div class="col-md-12">
                            {{ Html::linkRoute('posts.index', '<< See All posts', [], ['class' => 'btn btn-default btn-block btn-h1-spacing']) }}
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

@endsection
