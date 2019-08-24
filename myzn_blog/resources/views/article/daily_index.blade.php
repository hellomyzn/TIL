@extends('layout')

@section('content')
    <div class="container">
    @foreach( $dailies as $daily )
        <div class="row bg-info">
                <p >{{ $daily->title }}</p>
                <p >{{ $daily->picture}}</p>
                <p>{{ $daily->date }}</p>
                <p>{{ $daily->text }}</p>
            </div>
        </div>
    @endforeach
    </div>
@endsection

