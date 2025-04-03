<html>
    <head>
        <link href="{{ asset('css/style.css') }}" rel="stylesheet" />

        @yield('css')
    </head>
    <body>
        <h1>@yield('title')</h1>
        @section('menubar')
        <p class="menutitle">Menu</p>
        <li>To everyone</li>
        @show

        <div class="content">
            @yield('content')
        </div>

        <div class="footer">
            @yield('footer')
        </div>
    </body>
</html>
