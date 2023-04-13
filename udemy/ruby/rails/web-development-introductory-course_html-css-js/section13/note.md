

## ハンバーガーメニュー Navbar
```
        <nav class="navbar navbar-expand-lg navbar-light bg-white shadow-sm">
            <div class="container-fluid">

                <a href="index.html" class="navbar-brand">cats</a>
                <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarsupportedcontent" aria-controls="navbarsupportedcontent" aria-expanded="false" aria-label="toggle navigation">
                    <span class="navbar-toggler-icon"></span>
                </button>
                <div class="collapse navbar-collapse" id="navbarsupportedcontent">
                    <ul class="navbar-nav">
                        <li class="nav-item">
                            <a href="index.html" class="nav-link active">home</a>
                        </li>
                        <li class="nav-item">
                            <a href="#" class="nav-link">new</a>
                        </li>
                        <li class="nav-item">
                            <a href="index.html" class="nav-link">about</a>
                        </li>
                    </ul>
                </div>
            </div>
        </nav>
```


## Padding
`px`は左右、 `py`上下にpaddingをつける
```
        <div class="px-3 py-5 bg-img">
```

## Mergin
'mt' でmergin-topになる
```
        <div class="container mt-4">
```

## Gap
'gy'でgrid systemのgapを使用することができる。gyで上下のgapを設定可能
```
            <div class="row gy-3">
```

## FontのBasic設定
- "Hiragino Kaku Gothic ProN": Mac用のフォント
- "メイリオ": Win用のフォント
- sans-serif: どちらでもない場合
```
body {
    font-family: "Hiragino Kaku Gothic ProN", "メイリオ", sans-serif;
}

```
