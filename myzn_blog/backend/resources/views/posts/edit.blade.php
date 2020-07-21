@extends('../layouts/main')

@section('title', '| Edit Blog Post')

@section('content')
{!! Form::model($post, ['method' => 'PUT', 'route' => ['posts.update', $post->id] ]) !!}
<div class="row">

    <div class="col-md-8">
        {{ Form::label('title', 'Title: ') }}
        {{ Form::text('title', null , ["class" => 'form-control']) }}

        {{ Form::label('body', 'Body: ', ['class' => 'form-spacing-top']) }}
        {{ Form::textarea('body',null,  ['class' => 'form-control']) }}
    </div>

    <div class="col-md-4">
        <div class="card">
            <div class="card-body">
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
                        {!! Html::linkRoute('posts.show', 'Cancel', array($post->id), array('class' => 'btn btn-primary btn-block')) !!}
                    </div>
                    <div class="col-sm-6">
                        {{ Form::submit('Save changes', ['class' => 'btn btn-success btn-block'])}}
                    </div>
                </div>
            </div>
        </div>
    </div> {{-- col-md-4 --}}

</div> {{-- end of row from form  --}}
{!! Form::close() !!}
@endsection
