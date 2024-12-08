## document.getElementsByClassName()
document.getElementsByClassName()は、特定のクラス名を持つ要素を取得するために使用します。
document.getElementsByClassName('クラス名');

例1: 特定のクラス名を持つ要素の数を表示する
```html
<ul>
  <li class="list">リスト</li>
  <li class="list">リスト</li>
  <li class="list">リスト</li>
</ul>

<button id="myButton">listの数は？</button>

<script>
  document.addEventListener("DOMContentLoaded", function() {
  const lists = document.getElementsByClassName('list');
  const button = document.getElementById("myButton");
  button.addEventListener("click", function() {
    alert(lists.length);
  });
});
</script>
```
このコードでは、listというクラス名を持つ要素を取得し、ボタンをクリックすると要素の数を表示します。

例2: 特定のクラス名を持つ要素をハイライトする
```html
<p class="highlight-target">これはハイライト対象のテキスト1です。</p>
<p class="highlight-target">これはハイライト対象のテキスト2です。</p>
<p>これはハイライト対象でないテキストです。</p>
<button id="highlightButton">ハイライト</button>

<script> 
  document.getElementById('highlightButton').addEventListener('click', function() {
    const elementsToHighlight = document.getElementsByClassName('highlight-target');
    for (let i = 0; i < elementsToHighlight.length; i++) {
      elementsToHighlight[i].style.backgroundColor = 'yellow';
    }
  });
</script>
```
このコードのサンプルでは、ボタンをクリックすると、highlight-targetクラスを持つ全ての要素が黄色くハイライトされます。


## element.textContent
element.textContentは、JavaScriptのDOM（Document Object Model）の一部で、HTML要素の中のテキストを取得したり、変更したりするために使います。
textContentはHTMLタグを無視して、テキストだけを取得します。
ここでのelementは、操作したいHTML要素を指します。

例1: テキストの変更
ウェブページの特定の部分のテキストを読み込み変更するためにelement.textContentを使います。

```html
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
このコードは、idがmyElementのHTML要素のテキストを取得して、変更して表示します。


## document.getElementsByTagName()
document.getElementsByTagName()は、特定のタグ名を持つ要素を取得するために使用します。
document.getElementsByTagName(`タグ名`)

例1:特定のタグ名を持つ要素の文字色を変更する
```html
<ul>
  <li>リスト</li>
  <li>リスト</li>
  <li>リスト</li>
  <li>リスト</li>
  <li>リスト</li>
</ul>

<script>
const lists = document.getElementsByTagName('li');

Array.from(lists).forEach(function(listItem) {
  listItem.style.color = "blue";
});
</script>
```
このコードでは、liタグを取得し、Array.from(lists)を使用して配列に変換しています。その後、配列の各要素に対してforEachメソッドを使用し、文字色を青色に設定しています。

## document.querySelector()
document.querySelector()は、JavaScriptの中でとても重要な役割を果たすメソッドです。
これは、ウェブページの中から特定の要素を探し出すための道具のようなものです。例えば、ウェブページの中にあるボタンやテキストボックスなどを探すときに使います。
使い方はとても簡単で、document.querySelector()の中に探したい要素の名前を書きます。要素の名前は、HTMLのタグ名やid、クラス名などを使って指定します。

```js
document.querySelector("要素の名前");
```

例1: タグ名で要素を取得
ウェブページの中からタグを取得するときに使います。
```html
<p>最初のpタグの文字色が変わります</p>
<p>このpタグの文字色は変わりません</p>

<script>
const paragraph = document.querySelector("p");
paragraph.style.color = "red";
</script>
```
このコードは、ウェブページの中から最初に見つかったp要素を探し出して、paragraphという名前の箱（変数）に入れています。

例2: クラス名で要素を取得
ウェブページの中から特定のクラス名を持つ要素を取得するときに使います。
```html
<ul>
  <li class="list">クラスが指定されているリスト</li>
  <li>クラスが指定されていないリスト</li>
  <li class="list">クラスが指定されているリスト</li>
</ul>

<script>
const marker = document.querySelector(".list");
marker.style.backgroundColor = "yellow";
</script>
```
このコードは、ウェブページの中から最初に見つかった.listというクラス名を持つ要素を探して、その要素をmarkerという名前の変数に保存します。


## document.querySelectorAll()
document.querySelectorAll()は、特定の条件に合う要素をすべて取得します。

```js
document.querySelectorAll(`タグ名、クラス名など`);
```

例1:特定の条件に合う要素のテキストを1つずつ表示する
```html
<ul>
  <li class="food">じゃがいも</li>
  <li class="food">にんじん</li>
  <li class="food">玉ねぎ</li>
  <li class="food">お肉</li>
  <li class="fruits">みかん</li>
  <li class="fruits">いちご</li>
</ul>

<button id="myButton">カレーの材料を表示する</button>

<script>
document.addEventListener("DOMContentLoaded", () => {
// liタグに指定されたclass='food'を取得
  const curry = document.querySelectorAll('li.food');
  const button = document.getElementById("myButton");

  button.addEventListener("click", () => {
// ボタンをクリックすると、forEachを使って要素を1つずつ順番に表示
    curry.forEach((element) => alert(element.textContent));
  });
});
</script>
```
このコードでは、liタグに指定されたfoodというクラス名を持つ要素を取得し、ボタンをクリックすると要素のテキストを1つずつ表示します。


## parentElement
スライドで学ぼう！

parentElementを使用すると、特定の要素の親要素を取得します。

```js
element.parentElement
```

例1: 親要素を取得してスタイルを設定する
```html
<div class="parent">親要素です
  <p class="child">子要素です</p>
</div>

<script>
  document.addEventListener("DOMContentLoaded", function() {
    const parent = document.querySelector('p.child').parentElement;
    parent.style.width = '100px';
    parent.style.height = '100px';
    parent.style.backgroundColor = 'red';
  });
</script>
```
このコードでは、まずpタグで.childというクラスがついた要素の親要素を取得し、親要素に対してスタイルを設定しています。


## children
childrenを使用すると、要素の子要素を取得します。

```js
親要素.children
```

例1: 子要素を取得し文字色を変更する
```html
<div class="parent">
  親要素です
  <p class="child">子要素です</p>
  <p class="child">子要素です</p>
</div>

<script>
  const child = document.querySelector('div.parent').children;
  for (let i = 0; i < child.length; i++) {
    child[i].style.color = "red";
  }
</script>
```
このコードでは、子要素をchildrenで取得し、配列化した上で文字色を赤に指定しています。

## nextElementSibling
nextElementSiblingを使用すると、指定した要素の次にあたる要素を取得します。

例1: 2番目のdiv要素を取得し背景色を変更する
```html
<div id="firstDiv">これは1番目の要素です</div>
<div id="secondDiv">これは2番目の要素です</div>

<script>
const firstDiv = document.getElementById('firstDiv');
const secondDiv = firstDiv.nextElementSibling;

// 2番目の<div>要素を取得し、背景色を変更
secondDiv.style.backgroundColor = "red"; 
</script>
```
このコードでは、まずdocument.getElementByIdでidfirstDivを取得し、その次にある`<div>`要素をnextElementSiblingで取得しています。


## previousElementSibling
previousElementSiblingを使用すると、指定した要素の前にある要素を取得します。

例1: 1番目のdiv要素を取得し背景色を変更する
```html
<div id="firstDiv">これは1番目の要素です</div>
<div id="secondDiv">これは2番目の要素です</div>

<script>
const secondDiv = document.getElementById('secondDiv');
const firstDiv = secondDiv.previousElementSibling;

// 1番目の<div>要素を取得し、背景色を変更
firstDiv.style.backgroundColor = "red"; 
</script>
```
このコードでは、まずdocument.getElementByIdでidsecondtDivを取得し、その前にある<div>要素をpreviousElementSiblingで取得しています。


## firstElementChild

firstElementChildを使用すると、指定された要素の子要素の中で、最初の要素を取得します。

```js
親要素.firstElementChild
```
例1: 最初の子要素の文字色を変更する
```html
<ul id="parent">
  <li>これは最初の子要素です。</li>
  <li>これは2番目の子要素です。</li>
</ul>

<script>
const parent = document.getElementById('parent');
const firstChild = parent.firstElementChild;

// 文字色を変更
firstChild.style.color = "red";
</script>
```
このコードでは、まずdocument.getElementById('parent')でidparentを取得した後、最初の子要素をfirstElementChildで取得し、文字色を赤に変更しています。


## lastElementChild
lastElementChildを使用すると、指定された要素の子要素の中で、最後の要素を取得します。

```js
親要素.lastElementChild
```

例1: 最後の子要素の文字色を変更する
```html
<ul id="parent">
  <li>これは最初の子要素です。</li>
  <li>これは2番目の子要素です。</li>
</ul>

<script>
const parent = document.getElementById('parent');
const lastChild = parent.lastElementChild;

// 文字色を変更
lastChild.style.color = "red";
</script>
```
このコードでは、まずdocument.getElementById('parent')でidparentを取得した後、最後の子要素をlastElementChildで取得し、文字色を赤に変更しています。

