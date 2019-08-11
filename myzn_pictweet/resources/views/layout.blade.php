<!DOCTYPE html>
<html>
  <head>
    <meta charset="utf-8">
    <title>Myzn PicTweet</title>
    <link rel="stylesheet" href="/css/style.css">
  </head>

  <body>
    <header class="header">
      <div class="header__bar row">
        <h1 class="grid-6"><a href="/">Myzn PicTweet</a></h1>
        @if(Auth::check())
            <div class="user_nav grid-6">
                {{ Form::open(['url' => "/logout", 'method' => 'post', 'id' => 'logout']) }}
                {{ Form::close() }}
                <a href="/logout" onclick="event.preventDefault(); document.getElementById('logout').submit();">Logout</a>
                <a class="post" href="/tweets/create">Post</a>
            </div>
        @else
            <div class="grid-6">
                <a href="/login" class="post">Login</a>
                <a class="post" href="/register">Register</a>
            </div>
        @endif
      </div>
    </header>

    @yield('content')
  </body>
</html>
