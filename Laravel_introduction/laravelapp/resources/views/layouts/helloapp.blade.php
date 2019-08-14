<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>@yield('title')</title>
</head>
<body>
    <h1>@yield('title')</h1>
    @section('menubar')
    <ul>
        <p>Menu</p>
        <li>@show</li>
    </ul>
    
    <hr>
    <div>
        @yield('content')
    </div>
    
    <div>
        @yield('footer')
    </div>
</body>
</html>
