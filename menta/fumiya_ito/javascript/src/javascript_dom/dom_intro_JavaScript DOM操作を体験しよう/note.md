## document.getElementById()

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

## element.textContent

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

## element.style

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
<!-- ・"color"というclassを持つ要素の文字色を赤色
・"weight"というclassを持つ要素の文字を太字
・"background"というclassを持つ要素の文字の背景色を黄色 にしています。 -->
```

## document.getElementById()

document.getElementById()は、JavaScriptDOM の中でとても重要な役割を果たすものです。
これは、ウェブページの中から特定の要素を探し出すための道具のようなものです。
例えば、ウェブページの中にあるボタンやテキストボックスなどを探すときに使います。
この document.getElementById()を使うときは、探したい要素に紐づけられている「id」を指定します。
すると、その「id」がつけられた要素を見つけてくれます。

"id"は HTML の要素につけることができる一意の名前です。

document.getElementById("id 名");
例 1: id 要素を取得する

```js
const textElement = document.getElementById("myTextbox");
// このコードでは、"myTextbox"という id がつけられた要素を取得しています。
// そして、その要素を textElement という定数に設定しています。
```

## element.textContent

element.textContent は、JavaScript の DOM（Document Object Model）の一部で、HTML 要素の中のテキストを取得したり、変更したりするために使います。
textContent は HTML タグを無視して、テキストだけを取得します。
ここでの element は、操作したい HTML 要素を指します。

例 1: テキストの変更
ウェブページの特定の部分のテキストを読み込み変更するために element.textContent を使います。

このコードは、id が myElement の HTML 要素のテキストを取得して、変更して表示します。

```js
<p id="myElement">デフォルトのテキスト</p>
<button id="myButton">クリックするとテキストが変更する！</button>

<script>
 const text = document.getElementById("myElement");
 const button = document.getElementById('myButton');
 button.addEventListener('click', function() {
     text.textContent = '新しいテキスト';
 });
</script>
```

## element.appendChild(element)

JavaScript の element.appendChild(element)は、新しい子要素を既存の要素の最後に追加するための方法です。
この方法を使うと、ウェブページに新しい内容を追加したり、既存の内容を変更したりすることができます。

```js
parentElement.appendChild(childElement);
```

例 1: 新しい段落を追加する
ボタンをクリックすることで、段落を追加することができます

```html
<div id="paragraphContainer">
  <p>段落です。</p>
</div>
<button id="myButton">クリックすると段落を追加する！</button>

<script>
  const newParagraph = document.createElement("p");
  newParagraph.textContent = "これは新しい段落です。";
  const paragraphContainer = document.getElementById("paragraphContainer");
  const button = document.getElementById("myButton");
  button.addEventListener("click", function () {
    paragraphContainer.appendChild(newParagraph);
  });
</script>
```

## createElement(tag_type)

createElement(tag_type)は、JavaScript の DOM（Document Object Model）操作で使われる関数の一つです。

createElement()を使うと、新しい HTML 要素（タグ）を作ることができます。

カッコ内には、作りたい HTML 要素の名前を入れます。
例えば、createElement('div')と書くと、新しい div 要素が作られます。

```js
const newElement = document.createElement(tag_type);
```

例 1: 新しい段落（p 要素）を作る
新しい p 要素を作り、その後でその要素にテキストを追加します。
次に、newParagraph.textContent でその段落にテキストを追加しています。
最後に、document.body.appendChild(newParagraph)で body 要素の子要素としてテキストを設定します。

```js
const newParagraph = document.createElement("p");
newParagraph.textContent = "これは新しい段落です！";
document.body.appendChild(newParagraph);
// このコードでは、まずcreateElement('p')で新しいp要素を作り、それをnewParagraphという名前の定数に保存しています。
```

## element.remove()

JavaScript の element.remove は、Web ページの特定要素を取り除くための命令です。

```js
element.remove();
```

例 1: Web ページから特定の画像を消す
Web ページに表示されている画像（<img>タグで囲まれた部分）も消すことができます。

例えば、id が myImage の画像を消すには、以下のように書きます。
このコードの document.getElementById('myImage')の部分で、id が myImage の画像を見つけています。
そして、その後の.remove()でその画像を消しています。

```html
<img
  id="myImage"
  src="https://prod-code-lesson-api.s3.ap-northeast-1.amazonaws.com/cms/00631d80-ad96-4d18-b98d-1896a8732a66.png"
/>
<button id="myButton">クリックすると画像要素が消える！</button>

<script>
  const button = document.getElementById("myButton");
  button.addEventListener("click", function () {
    document.getElementById("myImage").remove();
  });
</script>
```

## element.removeChild()

JavaScript の element.removeChild()は、取り除きたい要素の「親」を見つけ、取り除きたい要素（子）を指定することができます。

親要素.removeChild(子要素);
例 1: リストアイテムの削除
リストの一部を取り除くこともできます。
このコードでは、まず document.getElementById()を使って、取り除きたいリストアイテムとその親であるリストを見つけています。
そして、removeChild()を使って、リストからリストアイテム３を取り除いています。

```html
<ul id="myList">
  <li id="listItem1">リストアイテム１</li>
  <li id="listItem2">リストアイテム２</li>
  <li id="listItem3">リストアイテム３</li>
</ul>
<button id="myButton">クリックするとリストアイテム３要素が消える！</button>

<script>
  const list = document.getElementById("myList");
  const listItem3 = document.getElementById("listItem3");
  const button = document.getElementById("myButton");
  button.addEventListener("click", function () {
    list.removeChild(listItem3);
  });
</script>
```
