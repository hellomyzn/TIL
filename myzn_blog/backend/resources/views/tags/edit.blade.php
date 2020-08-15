@extends('layouts.main')

@section('title', '| Edit Tag')

@section('content')

    {{ Form::open() }}
        {{ Form::label('title', "Title:") }}
        {{ Form::text('title', null, ['class' => 'form-control']) }}

        {{ Form::submit('Save Changes') }}
    {{ Form::close() }}
@endsection
