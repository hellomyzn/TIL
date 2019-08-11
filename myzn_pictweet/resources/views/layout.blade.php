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
        <div class="user_nav grid-6">
          <a href="/tweets/create" class="post">投稿する</a>
        </div>
      </div>
    </header>

    @yield('content')
  </body>
</html>
