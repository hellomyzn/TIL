<!DOCTYPE html>
<html class="pc" lang="ja" xmlns:fb="http://ogp.me/ns/fb#" xmlns:og="http://ogp.me/ns#">
<head>
  <meta charset="utf-8">
  <title>Myzn mooovi</title>
  <link href="{{ asset('css/review_site.css') }}" rel='stylesheet' type='text/css'>
</head>
<body class="yj950-2">
<div id="wrapper">
  <div id="yjContentsHeader">
    <nav class="globalnav">
      <div class="globalnav__menu">
        <ul class="gmenu">
          <li class="logo" style="float: left">
            <a href="/">Myzn mooovi</a>
          </li>
            @if (Auth::check())
              <li class="entry_button">
                {{ Form::open(['url' => "/logout", 'method' => 'post', 'id' => 'logout']) }}
                {{ Form::close() }}
                <a href="/logout" onclick="event.preventDefault(); document.getElementById('logout').submit();">Logout</a>
              </li>
              <li class="entry_button" style="float: right">
                  <a href="/users/{{ Auth::user()->id }}">MyPage</a>
              </li>
              <li class="entry_button" style="float: right">
                  <a href="/products/search">Seach</a>
              </li>
            @else
              <li class="entry_button" style="float: right">
                <a href="/register">Register</a>
              </li>
              <li class="entry_button" style="float: right">
                <a href="/login">Login</a>
              </li>
            @endif
        </ul>
      </div>
    </nav>
  </div>

  @yield('content')
</body>

</html>
