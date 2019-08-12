<!DOCTYPE html>
<html class="pc" lang="ja" xmlns:fb="http://ogp.me/ns/fb#" xmlns:og="http://ogp.me/ns#">
<head>
  <meta charset="utf-8">
  <title>Myzn mooovi</title>
  <link href="{{ asset('css/review_site.css') }}" rel='stylesheet' type='text/css'>
  <link href="{{ asset('css/font-awesome.css') }}" rel='stylesheet' type='text/css'>
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
  <div class="bgcolor-white pt1em pb1em" id="contents">
    @yield('content')
    <aside class="section">
      <h4 class="text-small hr-bottom--thin no-space-bottom">
        <i class="fa fa-hand-o-up color-gray-light"></i>Ranking
      </h4>
      <ul class="listview listview--condensed text-small">
        @php
          $i = 1;
        @endphp
        @foreach ($ranking as $product)
          <li data-cinema-id="346394">
            <a href="/products/{{ $product->id }}">
              <div class="box">
                <div class="box__cell w40 align-center">
                  <p class="label bgcolor-gray-lighter align-center">
                    {{ $i }}
                  </p>
                </div>
                <div class="box__cell pl1em">
                  <p class="text-xsmall no-space">
                    {{ $product->title }}
                  </p>
                  <img src="{{ $product->image_url }}" alt="">
                </div>
              </div>
            </a>
          </li>
          @php
            $i++;
          @endphp
        @endforeach
      </ul>
    </aside>
  </div>
</div>
<div class="copyright">
  Copyright (C) 2015  XXX Corporation. All Rights Reserved.
</div>
</body>
</html>
