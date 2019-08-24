@extends('layout')

@section('content')
<div class="container w-75">


    <div class="row justify-content-center  " >
        <div class="col-md-8 bg-primaly pl-0">
            <h1>Daily</h1>
        </div>
    </div>

    <div class="row justify-content-center" style="height:450px;">
        <div class="col-md-8 bg-info">
            fuga
        </div>
    </div>

    <div class="row justify-content-center mt-5" style="height: 350px;">
        <div class="col-md-4 bg-success pl-0">
            <div class="mr-3 bg-danger">
                hoge
            </div>

        </div>

        <div class="col-md-4 bg-danger pr-0">
            <div class="ml-3 bg-success">
                piyo
            </div>
        </div>
    </div>

    <div class="row justify-content-center mt-5" style="height: 350px;">
        <div class="col-md-4 bg-danger">piyo</div>
        <div class="col-md-4 bg-success">fuga</div>
    </div>

    <div class="row justify-content-center mt-5" style="height: 350px;">
        <div class="col-md-4 bg-success">fuga</div>
        <div class="col-md-4 bg-danger">piyo</div>
    </div>

    @foreach( $dailies as $daily )
        <p>{{ $daily->title }}</p>
        <p><img src="https://myzn-blog.s3-ap-southeast-1.amazonaws.com/{{ $daily->picture }}" alt=""></p>
        <p>{{ $daily->date }}</p>
        <p>{{ $daily->text }}</p>
    @endforeach
</div>
@endsection

