## element.className
element.classNameは、JavaScriptのDOMで使われるプロパティです。element.classNameを使うと、HTML要素のclass属性の値を取得したり、新たに設定したりすることができます。
class属性は、主にCSSでスタイルを適用するためのものです。
```js
element.className
```

例1: クラス名の取得
HTML要素のclass属性の値を取得するためにelement.classNameを使います。

```js
const element = document.getElementById("myElement");
console.log(element.className);
```

このコードでは、まずdocument.getElementById("myElement")でHTMLの中からidがmyElementの要素を取得しています。
その後、console.log(element.className)でその要素のclass属性の値をコンソールに表示しています。

例2: クラス名の設定
新たにクラス名を設定するためにもelement.classNameを使います。

```js
const element = document.getElementById("myElement");
element.className = "newClass";
```

このコードでは、まずdocument.getElementById("myElement")でHTMLの中からidがmyElementの要素を取得しています。
その後、element.className = "newClass"でその要素のclass属性の値をnewClassに変更しています。これにより、新たにnewClassのCSSスタイルが適用されます。

注意
使用する際に、以下の2点に注意する必要があります。

クラス名の上書き
element.classNameを使用して新しいクラス名を設定すると、要素の現在のクラス名が新しいクラス名に完全に上書きされます。
これは、ある要素が複数のクラス名を持っている場合、その他のクラス名を失うことを意味します。

```js
const element = document.getElementById("myElement");
// もともと "oldClass anotherClass" だったとする
element.className = "newClass"; // クラス名が "newClass" に上書きされる
```
複数のクラス名を設定する
複数のクラス名を設定する場合は、スペースで区切って文字列として設定します。

```js
const element = document.getElementById("myElement");
element.className = "newClass anotherNewClass"; // 2つのクラス名を設定
```
このコードでは、myElementのIDを持つ要素にnewClassとanotherNewClassの2つのクラス名を設定しています。


## element.classList.add()
element.classList.add()は、JavaScriptのDOM（Document Object Model）操作の一部で、特定のHTML要素に新しいクラスを追加するために使います。
HTML要素のクラスは、その要素の見た目や動きを制御するCSSのルールを適用するためのものです。elementは、操作したいHTML要素を指します。

```js
element.classList.add("newClass");
```

例1: ボタンをクリックした時にスタイルを変更する
あるボタンをクリックした時に、そのボタンの色を変えるためにelement.classList.add()を使うことができます。

```html
<button id="myButton">クリックすると赤色に変わるよ!</button>

<script>
const button = document.getElementById('myButton');
button.addEventListener("click", () => {
  button.classList.add("clicked");
});
</script>

<style>
.clicked {
   background-color: red;
}
</style>
```
このコードでは、まずbuttonという変数にHTMLの中のボタン要素を代入しています。
その後、そのボタンがクリックされた時に、clickedというクラスをそのボタンに追加しています。
このclickedクラスは、ボタンの背景色を赤にするCSSのルールが書かれています。そうすると、ボタンがクリックされた時にそのボタンの色が赤に変わる、という動きを作ることができます。


## element.classList.remove()
JavaScriptのelement.classList.remove()は、ウェブページの一部分（要素）から特定のクラスを取り除くための方法です。
クラスとは、ウェブページの見た目や動きを決めるためのルールのようなものです。例えば、文字の色や大きさ、背景の色などを決めることができます。

element.classList.remove()のelementは、クラスを取り除きたいウェブページの部分を指します。
そして、remove()の中に取り除きたいクラスの名前を書きます。

```js
element.classList.remove("クラス名");
```

例1: クラスの削除によるスタイリングの変更
```html
<button id="removeButton" class="red" >クリックすると元に戻るよ!</button>

<script>
const button = document.getElementById('removeButton');
button.addEventListener("click", () => {
  button.classList.remove("red");
});
</script>

<style>
.red {
   background-color: red;
}
</style>
```

この例では、ボタンをクリックすると、そのボタンからredクラスが削除され、ボタンの背景色が元の色（デフォルト）に戻ります。

例2: メニューの表示・非表示を切り替える
ウェブページのメニューを表示・非表示にするためにも、element.classList.remove()を使うことができます。表示・非表示を切り替えるためのクラスを取り除くことで、メニューを非表示にすることができます。

```js
menu.classList.remove("show");
```
上記のコードでは、menuという名前のメニューからshowというクラスを取り除いています。これにより、メニューが非表示になります。

## element.classList.toggle()
element.classList.toggle()は、JavaScriptのDOMで特定のHTML要素（ウェブページの部品）のクラス（見た目や動きを決めるためのルール）を切り替えるために使います。
つまり、特定のクラスがすでにある場合はそのクラスを取り除き、ない場合はそのクラスを追加します。

```js
element.classList.toggle("class-name");
```

例1: ボタンをクリックして色を切り替える
ウェブページにあるボタンをクリックすると、そのボタンの色が切り替わるようにすることができます。

```html
<button id="toggleButton">クリックすると色が変わるよ!</button>

<script>
const button = document.getElementById('toggleButton');
button.addEventListener("click", function() {
  button.classList.toggle("clicked");
});
</script>

<style>
.clicked {
   background-color: red;
}
</style>
```
このコードでは、ボタンがクリックされると、そのボタンのクラスにredがあるかどうかをチェックします。
もしredがあればそれを取り除き、なければredを追加します。

これにより、ボタンの色が切り替わります。


## element.classList.contains()
element.classList.contains()メソッドを使用すると、指定されたクラス名が要素に存在するかどうかを確認することができます。
クラスとは、HTML要素に名前をつけて、それに特定のスタイル（色や形など）を適用するためのものです。

```js
element.classList.contains("クラス名");
```

例1: クラス名が存在するかの確認
```html
<button id="checkButton" class="red">クラス名redが存在するか確認</button>

<script>
const button = document.getElementById('checkButton');
button.addEventListener("click", function() {
  alert(button.classList.contains("red"));
});
</script>

<style>
.red {
   background-color: red;
}
</style>
```

このコードでは、ボタンがクリックされた時、redクラスが存在するかどうかをアラートで表示します。
存在する場合はtrue、存在しない場合はfalseを表示します。

例2:クラスの有無によって処理を変える
特定のクラスが含まれているかどうかによって、処理を変えることもできます。

```js
const button = document.querySelector("button");

if (button.classList.contains("disabled")) {
  console.log("このボタンは無効化されています。");
} else {
  console.log("このボタンは有効です。");
}
```
このコードでは、ボタンがdisabledという名前のクラスを持っているかどうかを調べています。
もし持っていれば、このボタンは無効化されています。と表示し、持っていなければ、このボタンは有効です。と表示します。

## element.classList.replace()
JavaScriptのelement.classList.replace()は、ウェブページの一部（要素）についているクラスを、別のクラスに変えるための命令です。
replace()はその名札リストの中から特定の名札を探して、新しい名札に変えるという動作をします。

```js
element.classList.replace(元のクラス名, 新しいクラス名);
```

この命令を使うと、ウェブページの見た目を簡単に変えることができます。
例えば、ボタンが押されたときに色を変えるといったことが可能です。

例1: ボタンのクラスを置き換える
この例では、ボタンをクリックするとclickedクラスがnewClickedクラスに置き換えられ、ボタンの背景色が赤から青に変わります。

```html
<button id="replaceButton" class="clicked">クリックするとクラス名が変わるよ!</button>

<script>
const button = document.getElementById('replaceButton');
button.addEventListener("click", function() {
  button.classList.replace("clicked", "newClicked");
});
</script>

<style>
.clicked {
   background-color: red;
}
.newClicked {
   background-color: blue;
}
</style>
```