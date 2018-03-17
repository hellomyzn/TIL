<!DOCTYPE html>
<html>
  <head>
    <meta charset="utf-8">
    <title>Pictweet</title>
    <link rel="stylesheet" href="/css/style.css">
  </head>

  <body>
    <header class="header">
      <div class="header__bar row">
        <h1 class="grid-6"><a href="/">PicTweet</a></h1>
        @if (Auth::check())
          <div class="user_nav grid-6">
            <a class="post" href="/tweets/create">投稿する</a>
            <span>
              {{ Auth::user()->name }}
              <ul class="user__info">
                <li>
                  <a href="/logout">ログアウト</a>
                  <a href="/users/{{ Auth::user()->id }}">マイページ</a>
                </li>
              </ul>
            </span>
          </div>
        @else
          <div class="grid-6">
            <a href="/login" class="post">ログイン</a>
            <a href="/register" class="post">新規登録</a>
          </div>
        @endif
      </div>
    </header>

    @yield('content')

    <footer>
      <p>
        Copyright PicTweet 2014.
      </p>
    </footer>
  </body>
</html>
