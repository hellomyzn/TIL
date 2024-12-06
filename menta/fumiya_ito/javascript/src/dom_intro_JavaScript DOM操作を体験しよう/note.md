# document.getElementById()

これは、ウェブページの中から特定の要素を探し出すための道具のようなものです。
例えば、ウェブページの中にあるボタンやテキストボックスなどを探すときに使います。
この document.getElementById()を使うときは、探したい要素に紐づけられている「id」を指定します。
すると、その「id」がつけられた要素を見つけてくれます。
"id"は HTML の要素につけることができる一意の名前です。

```js
document.getElementById("id名");
```

例 1: id 要素を取得する

```html
<div id="myTextbox">myTextbox</div>
<script>
  const textElement = document.getElementById("myTextbox");
  console.log(textElement);
</script>
```

このコードでは、"myTextbox"という id がつけられた要素を取得しています。
そして、その要素を textElement という定数に設定しています。

# element.textContent

element.textContent は、JavaScript の DOM（Document Object Model）の一部で、HTML 要素の中のテキストを取得したり、変更したりするために使います。
textContent は HTML タグを無視して、テキストだけを取得します。
ここでの element は、操作したい HTML 要素を指します。

<!-- 例1: テキストの変更 -->
<!-- ウェブページの特定の部分のテキストを読み込み変更するためにelement.textContentを使います。 -->

```html
<p id="myElement">デフォルトのテキスト</p>
<button id="myButton">クリックするとテキストが変更する！</button>

<!-- このコードは、idがmyElementのHTML要素のテキストを取得して、変更して表示します。 -->
<script>
  const text = document.getElementById("myElement");
  var button = document.getElementById("myButton");
  button.addEventListener("click", function () {
    text.textContent = "新しいテキスト";
  });
</script>
```

# element.style

JavaScript の element.style は、ウェブページの一部分（要素）の見た目を変えることができます。
CSS と同じように、要素の色を変えたり、大きさを変えたり、位置を動かしたりすることができます。

```html
<script>
  element.style.property = "value";
</script>
```

CSS のプロパティの指定方法
CSS の color や margin などの一語であれば、そのまま指定することが可能ですが、ハイフン（-）が使用されているプロパティは、キャメルケースで指定します。
キャメルケースとは、backgroundColor のように最初の要素語の先頭は小文字、次の要素語から先頭は大文字になる書き方です。
background-color 　 → 　 backgroundColor border-radius 　 → 　 borderRadius
margin-top 　 → 　 marginTop 例 1: 要素の大きさを変える
画像などの要素の大きさを変えることもできます。
例えば、画像を大きくしたり小さくしたりすることができます。

```html
<div class="imgContainer">
  <img
    id="myImage"
    class="myImage"
    src="https://prod-code-lesson-api.s3.ap-northeast-1.amazonaws.com/cms/00631d80-ad96-4d18-b98d-1896a8732a66.png"
  />
  <button id="myButton">クリックすると画像要素が大きくなる！</button>
</div>

<style>
  .imgContainer {
    display: flex;
    flex-direction: column;
    gap: 16px;
  }
  .myImage {
    width: 300px;
  }
</style>

<script>
  var button = document.getElementById("myButton");
  button.addEventListener("click", function () {
    document.getElementById("myImage").style.width = "600px";
  });
</script>
```

<!-- 上記のコードでは、"myImage"というIDを持つ要素（この場合は画像）の幅を600ピクセルに変えています。 -->
<!-- 例2: 要素の文字色、太さ、背景色を変える file_logo_htmlコード例.html -->

```html
<p class="color">文字色が変わります</p>
<p class="weight">文字が太字になります</p>
<p class="background">文字に背景色がつきます</p>
<p>
  <script>
    const red = document.querySelector(".color");
    red.style.color = "red";

    const bold = document.querySelector(".weight");
    bold.style.fontWeight = "bold";

    const yellow = document.querySelector(".background");
    yellow.style.backgroundColor = "yellow";
  </script>
</p>
・"color"というclassを持つ要素の文字色を赤色
・"weight"というclassを持つ要素の文字を太字
・"background"というclassを持つ要素の文字の背景色を黄色 にしています。
```
