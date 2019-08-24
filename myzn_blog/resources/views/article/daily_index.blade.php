@extends('layout')

@section('content')
<div class="container">INDEX DAILY

    @foreach( $dailies as $daily )
        <p>{{ $daily->title }}</p>
        <p><img src="https://myzn-blog.s3-ap-southeast-1.amazonaws.com/{{ $daily->picture }}" alt=""></p>
        <p>{{ $daily->date }}</p>
        <p>{{ $daily->text }}</p>
    @endforeach
</div>
@endsection

