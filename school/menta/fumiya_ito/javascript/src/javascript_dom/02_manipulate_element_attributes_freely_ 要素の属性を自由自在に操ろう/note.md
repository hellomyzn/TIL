## element.getAttribute()

getAttribute()は、指定した要素の属性を取得する。
指定された属性が存在しない場合、値は null が返る。

例 1: 要素の id 属性と class 属性を取得します

```html
<body>
  <div id="sample">サンプル</div>
  <script>
    const sample = document.getElementById("sample");
    console.log(sample.getAttribute("id"));
    // コンソール結果 'sample'

    console.log(sample.getAttribute("class"));
    // コンソール結果 null
  </script>
</body>
```

## element.setAttribute()

setAttribute()は、指定の要素に新しい属性を追加したり、指定の要素に存在する属性の値を変更したりできる。

例 1: 要素の id 属性を sample2 に変更します

```html
<body>
  <div id="sample">ボタン</div>
  <script>
    const sample = document.getElementById("sample");
    sample.setAttribute("id", "sample2");
  </script>
</body>
```

例 2: 要素に disabled 属性を設定します

```html
<body>
  <button id="sample">ボタン</button>
  <script>
    const sample = document.getElementById("sample");
    sample.setAttribute("disabled", true);
  </script>
</body>
```

## element.removeAttribute()

removeAttribute()は、指定の要素の属性を削除できる。

例 1: 要素の id 属性を削除します

```html
<body>
  <div id="sample">ボタン</div>
  <script>
    const sample = document.getElementById("sample");
    sample.removeAttribute("id");
  </script>
</body>
```

## `<input readonly>`

`<input readonly>`は、HTML で入力フォームを作成する際に使用される要素の一つです。書き換えを禁止し、読み出し専用にします。この要素は、ユーザーが入力できないようにするために使用されます。

readonly 属性が有効なのはテキスト入力欄のみで、チェックボックスやボタンなどには無効となります。
送信ボタンで、値の送信は行われます。

例 1：テキスト入力欄を読み出し専用にします
`<input>`要素の readonly 属性によって、ユーザーが名前を入力することができなくなります。ただし、JavaScript を使用して値を設定することはできます。

file_logo_html コード例.html

```html
<input type="text" value="編集できない値" readonly />
```

例 2: フォームの送信前に確認画面を表示する場合
フォームの送信前に確認画面を表示する場合、`<input readonly>`を使用し、この場合、`<input>`要素の readonly 属性によって、ユーザーが名前とメールアドレスを変更することができなくなります。また、`<form>`要素の onsubmit 属性によって、送信前に確認画面が表示し、誤りがないか確認することができます。

```html
<form
  action="submit.php"
  method="post"
  onsubmit="return confirm('送信してよろしいですか？');"
>
  <label for="name">名前:</label>
  <input type="text" id="name" name="name" readonly />
  <br />
  <label for="email">メールアドレス:</label>
  <input type="email" id="email" name="email" readonly />
  <br />
  <input type="submit" value="送信" />
</form>
```
