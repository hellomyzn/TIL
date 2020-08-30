<html>
    <head>
        <link href="{{ asset('css/style.css') }}" rel="stylesheet" />
    </head>
    <body>
        <h1>@yeild('title')</h1>
        @section('menubar')

        <ul>
            <p class="menutitle">Menu</p>
            <li>@show</li>
        </ul>
        <hr>

        <div class="content">
            @yield('content')
        </div>

        <div class="footer">
            @yield('footer')
        </div>
    </body>
</html>
