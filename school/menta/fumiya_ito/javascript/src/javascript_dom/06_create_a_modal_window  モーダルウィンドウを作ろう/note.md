## `<button>`

ボタンを作成するために使用します。
フォームの「送信ボタン」や「リセットボタン」、その他に「クリックしたらJavaScriptで何らかの処理を行いたい」という場合にも使用されます。
`<a>`の中に作成してはいけません。

例1：送信ボタンを作成します
```html
<!-- 送信ボタン -->
<button type="submit">送信</button>
```

例2：リセットボタンを作成します
file_logo_htmlコード例.html
```html
<!-- リセットボタン -->
<button type="reset">リセット</button>
```

例3：JavaScriptの処理を実行するボタンを作成します
file_logo_htmlコード例.html
```html
<!-- JSでアラーム出力処理を実行 -->
<script>
  function alert() {
    alert('要素がクリックされました')
  }
</script>
<button type="button" onclick="alert()">アラーム出力</button>
```


`<input type="button">`との違い
`<button>`には擬似要素を使用できますが、`<input>`には使用することができません。擬似要素を使用することで、CSSでのデザイン自由度が高くなるため、`<button>`の使用が推奨されています。


## window.onclick
window.onclickは、ウェブページ上でマウスのクリックが行われたときに何かを実行するためのものです。window.onclickに関数を設定すると、その関数がクリック時に実行されます。
```js
window.onclick = function() {
  // ここにクリック時に実行したいコードを書く
}
```

例1: ページ全体でのクリックを検知する
ウェブページ全体でクリックが行われたときに、メッセージを表示することができます。

```js
window.onclick = function() {
  alert("ページがクリックされました！");
}
```
このコードは、ウェブページ全体がクリックされると、"ページがクリックされました！"というメッセージが表示されます。

例2: クリック位置の座標を取得する
ウェブページ全体でクリックが行われたときに、そのクリック位置の座標を取得することができます。
```js
window.onclick = function(event) {
  alert("クリックされた位置: X=" + event.clientX + ", Y=" + event.clientY);
}
```
このコードは、ウェブページ全体がクリックされると、そのクリックされた位置のX座標とY座標を表示します。eventという名前のオブジェクトには、クリックイベントの詳細情報が含まれています。その中のclientXとclientYは、それぞれクリック位置のX座標とY座標を表しています。