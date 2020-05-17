@extends('../layouts/main')

@section('stylesheets')
    <link rel="stylesheet" href="style.css" type="text/css">
@endsection

@section('content')
<div class="row">
    <div class="col-md-12">
        <div class="jumbotron">
            <h1 class="display-4">Wellcome to My Blog!</h1>
            <p class="lead">Thank you so much for visting. This is my test website built with Laravel. Please road my popular post </p>
            <a class="btn btn-primary btn-lg" href="#" role="button">Popular Post</a>
        </div>
    </div>
</div>

<div class="row">
    <div class="col-md-8">

        <div class="post">
            <h3>Post Title</h3>
            <p>
                Lorem, ipsum dolor sit amet consectetur adipisicing elit. Unde veniam ipsa impedit autem dolorum quas, quos, nulla nihil distinctio mollitia cum voluptates suscipit praesentium aut dolorem quibusdam? Nam, eaque! Est.
            </p>
            <a href="" class="btn btn-primary">Read More</a>
        </div>
        <hr>

        <div class="post">
            <h3>Post Title</h3>
            <p>
                Lorem, ipsum dolor sit amet consectetur adipisicing elit. Unde veniam ipsa impedit autem dolorum quas, quos, nulla nihil distinctio mollitia cum voluptates suscipit praesentium aut dolorem quibusdam? Nam, eaque! Est.
            </p>
            <a href="" class="btn btn-primary">Read More</a>
        </div>
        <hr>

        <div class="post">
            <h3>Post Title</h3>
            <p>
                Lorem, ipsum dolor sit amet consectetur adipisicing elit. Unde veniam ipsa impedit autem dolorum quas, quos, nulla nihil distinctio mollitia cum voluptates suscipit praesentium aut dolorem quibusdam? Nam, eaque! Est.
            </p>
            <a href="" class="btn btn-primary">Read More</a>
        </div>
        <hr>

        <div class="post">
            <h3>Post Title</h3>
            <p>
                Lorem, ipsum dolor sit amet consectetur adipisicing elit. Unde veniam ipsa impedit autem dolorum quas, quos, nulla nihil distinctio mollitia cum voluptates suscipit praesentium aut dolorem quibusdam? Nam, eaque! Est.
            </p>
            <a href="" class="btn btn-primary">Read More</a>
        </div>
        <hr>
    </div> {{-- end of .col-md-8 --}}

    <div class="col-md-3 col-md-offset-1" >
        <h2>Sidebar</h2>
    </div>
</div> {{-- end of .row --}}

@endsection


@section('scripts ')
    <script src="js/scripts.js"></script>
@endsection
