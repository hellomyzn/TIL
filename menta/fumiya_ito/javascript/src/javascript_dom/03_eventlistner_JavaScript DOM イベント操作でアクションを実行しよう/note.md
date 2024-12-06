## document.addEventListener()

document.addEventListener()は、JavaScript の DOM（Document Object Model）で使われる関数です。
これは、ウェブページ上の特定の要素に対して何か特定の事象（イベント）が起こったときに、何か特定の動作（関数）を行うように指示するために使います。

例えば、ボタンがクリックされたときにメッセージを表示する、といったことができます。

使い方
基本的な使い方は以下のようになります。
次のように引数を指定します。

```js
対象要素.addEventListener(種類, 関数, false);
```

第 1 引数はイベントの種類、第 2 引数は実行させる関数を指定します。第 3 引数は true か false のどちらかを指定できますが、通常は false を選択します。

例 1: ボタンをクリックしたときにメッセージを表示する
ボタンがクリックされたときに、「ボタンがクリックされました」というメッセージを表示する例です。
このコードでは、まず document.querySelector('button')でボタンを選択しています。その後、addEventListener を使って、そのボタンがクリックされたときに alert('ボタンがクリックされました');というコードを実行するように指示しています。

```html
<button>クリックしてね</button>

<script>
  document.querySelector("button").addEventListener("click", () => {
    alert("ボタンがクリックされました");
  });
</script>
```

例 2: マウスが要素の上に乗ったときに色を変える
マウスが特定の要素の上に乗ったときに、その要素の色を変える例です。
このコードでは、まず document.querySelector('p')で p 要素を選択しています。その後、addEventListener を使って、その p 要素の上にマウスが乗ったときに this.style.backgroundColor = 'red';というコードを実行するように指示しています。これにより、マウスが p 要素の上に乗るとその背景色が赤に変わります。

```html
<p>マウスオーバーすると背景色が変わるよ</p>

<style>
  p {
    background-color: yellow;
  }
</style>

<script>
  document.querySelector("p").addEventListener("mouseover", (e) => {
    e.target.style.backgroundColor = "red";
  });
</script>
```

使用例
ボタンをクリックしたら、アラームのポップアップを出す
スクロールをするとアニメーションが動き出す
Web ページが読み込み完了してから特定の処理を実行する
注意点
HTML を対象要素に設定する場合は、定数または変数に代入してから使用することが推奨されています。

```js
// 画面をスクロールされる度にイベントを実行する
const scrollHandler = () => {
  console.log("スクロールされました！");
};

window.addEventListener(scroll, scrollHandler, false);

// HTML の id 属性を取得する
const button = document.getElementById("button");

// 該当の要素がクリックされる度にイベントを実行する
button.addEventListener("click", () => {
  console.log("クリックされました！");
});
```

## click イベント

addEventListener メソッドで、第一引数に click を指定することで、クリック時の処理を要素に登録することが出来ます。
具体的には、click イベントを使用すると、ユーザーがボタンをクリックしたときにメッセージが表示される、といったことができます。

```js
element.addEventListener("click", () => {
  // ここにクリックしたときに行う処理を書く
});
```

例 1: ボタンをクリックしてメッセージを表示する
このコードでは、下記の順番でクリック時にアラートを出す処理を定義しています。

```html
<button id="myButton">クリックするとアラートが出るよ！</button>

<script>
  const button = document.getElementById("myButton");
  button.addEventListener("click", () => {
    alert("ボタンがクリックされました！");
  });
</script>
```

document.getElementById('myButton')で HTML 内の myButton という ID を持つ要素（この場合はボタン）を取得
次に、そのボタンに対して addEventListener を使ってクリックイベントを設定
ボタンがクリックされると、alert('ボタンがクリックされました！')が実行されてメッセージが表示される
例 2: ボタンをクリックして画像を切り替える

```html
<button id="myButton">画像変更ボタン</button>
<img
  id="myImage"
  src="https://picsum.photos/id/237/200/300
"
  style="display: block; margin-top: 10px;"
/>

<script>
  const button = document.getElementById("myButton");
  const image = document.getElementById("myImage");
  button.addEventListener("click", () => {
    image.src = "https://picsum.photos/seed/picsum/200/300";
  });
</script>
```

プレビュー このコードでは、下記の順番で画像を切り替える処理を定義しています。
まずボタンと画像をそれぞれ取得 ボタンがクリックされたときに、画像の src
属性（画像の URL
を指定する属性）をhttps://picsum.photos/seed/picsum/200/300に変更
これにより、クリックすると画像が切り替わる

## mouseover イベント

mouseover イベントは、ユーザーがマウスを要素の上に置いたときに発生するイベントです。ボタンの色を変えたり、情報を表示したりすることができます。

```js
element.addEventListener("mouseover", function () {
  // ここにマウスオーバー時に行いたい処理を書く
});
```

例 1: ボタンの色を変える
このコードでは、button 要素にマウスが乗ったときに、そのボタンの背景色を赤に変更しています。

```html
<button id="myButton">マウスを置くと赤くなるよ！</button>

<script>
  const button = document.getElementById("myButton");
  button.addEventListener("mouseover", function () {
    button.style.backgroundColor = "red";
  });
</script>
```

例 2: テキストを増やす
このコードでは、.mytooltip という ID が付いた要素にマウスが乗ったときに、子要素として新しい div タグとテキストを設定し、画面に表示させています。

```html
<div id="mytooltip">マウスを置くと…</div>

<script>
  const tooltip = document.getElementById("mytooltip");
  tooltip.addEventListener(
    "mouseover",
    function () {
      const tips = document.createElement("div");
      tips.textContent = "テキストが増えるよ！";
      tooltip.appendChild(tips);
    },
    { once: true }
  ); // このイベントリスナーは一度だけ実行されます
</script>
```

## DOMContentLoaded

DOMContentLoaded は、ウェブページが読み込まれた後に発生するイベントです。

```js
document.addEventListener("DOMContentLoaded", function () {
  // ここにウェブページが読み込まれた後に実行したいコードを書く
});
```

例 1: 読み込みが完了したら h1 タグの内容を変更する
このコードでは、DOMContentLoaded イベントが発生したら、h1 タグの内容を変更しています。

```html
<h1 id="myTitle">ページを読み込むと…</h1>

<script>
  document.addEventListener("DOMContentLoaded", function () {
    const title = document.getElementById("myTitle");
    title.innerHTML = "タイトルが変わるよ！";
  });
</script>
```

例 2: ボタンのクリックイベントを設定する
このコードでは、まず DOMContentLoaded イベントが実行されてページが読み込まれた後、myButton という ID のボタンがクリックされたときにアラートを表示するように設定しています。

```html
<button id="myButton">ボタンをクリック</button>

<script>
  document.addEventListener("DOMContentLoaded", function () {
    const button = document.getElementById("myButton");
    button.addEventListener("click", function () {
      alert("ボタンがクリックされました！");
    });
  });
</script>
```

## this

this は、関数内で参照される特別な読み取り専用のキーワードです。
this の値は、関数がどのような手段や状況で呼び出されたかによって変化し、関数が実行されるたびにその値は動的に決定されます。

```js
function checkThis() {
  console.log(this);
}
```

例 1: クリックイベントでの this
このコードの this は、

```html
<button id="myButton">...</button>
```

要素自体を指しています。
これにより、クリックされたボタンのテキストコンテンツが「テキストが変わるよ！」に変更されます。

```html
<button id="myButton">クリックすると…</button>

<script>
  const button = document.getElementById("myButton");

  button.addEventListener("click", function () {
    this.textContent = "テキストが変わるよ！";
  });
</script>
```

## change イベント

change イベントは、ユーザーがフォーム要素（テキストボックスやセレクトボックスなど）の値を変更して、その要素からフォーカスが外れたときに発生します。

```js
element.addEventListener("change", function () {
  // ここに値を変更した後の処理を書く
});
```

例 1: テキストボックスの値が変更されたときにメッセージを表示する
このコードでは、myTextbox という ID を持つテキストボックスの内容が変更されるとアラートメッセージが表示されます。

```html
<input type="text" id="myTextbox" />

<script>
  const textbox = document.getElementById("myTextbox");
  textbox.addEventListener("change", function () {
    alert("テキストを変更しました : " + this.value);
  });
</script>
```

例 2: セレクトボックスの値が変更されたときに行う処理
このコードでは、mySelect という ID を持つセレクトボックスがあるとき、その値が変更されると、例 1 と同様にアラートメッセージが表示されます。

```html
<select id="mySelect">
  <option value="国内">国内</option>
  <option value="海外">海外</option>
</select>

<script>
  const select = document.getElementById("mySelect");
  select.addEventListener("change", function () {
    if (select.value === "国内") {
      alert("選択しました： 国内");
    } else {
      alert("選択しました： 海外");
    }
  });
</script>
```

## checked

JavaScript の DOM（ドキュメントオブジェクトモデル）の checked は、チェックボックスやラジオボタンが選択されているかどうかを調べたり、選択状態を変更したりするために使います。checked の値が true なら選択されている、false なら選択されていないということを意味します。

```js
element.checked;
```

例 1: チェックボックスが選択されているか調べる
Web ページにあるチェックボックスが選択されているかどうかを調べることができます。
このコードでは、まず document.getElementById('myCheckbox')でチェックボックスの要素を取得しています。その後、if (checkbox.checked)でチェックボックスが選択されているかどうかを調べています。選択されていれば'チェックボックスは選択されています！'、選択されていなければ'チェックボックスは選択されていません！'とアラートで表示します。

```js
const checkbox = document.getElementById("myCheckbox");
if (checkbox.checked) {
  alert("チェックボックスは選択されています！");
} else {
  alert("チェックボックスは選択されていません！");
}
```

例 2: チェックボックスを選択状態にする
checked を使って、チェックボックスを選択状態にすることもできます。
このコードでは、まず document.getElementById('myCheckbox')でチェックボックスの要素を取得しています。その後、checkbox.checked = true;でチェックボックスを選択状態にしています。

```js
const checkbox = document.getElementById("myCheckbox");
checkbox.checked = true;
```

## submit イベント

submit イベントは、フォームが送信されたときに発生します。
例えば、お問い合わせフォームを送信するときに、入力内容が正しいかどうかをチェックしたり、送信前に確認メッセージを表示したりすることができます。

```js
element.addEventListener("submit", function () {
  // ここに、フォームが送信されたときに行いたい動作を書く
});
```

例 1: 入力内容のチェック
このコードでは、もしテキストが入力されていなければ、e.preventDefault でフォームの送信を止め、アラートメッセージを表示します。

```html
<form id="myForm">
  <input type="text" id="myTextbox" />
  <input type="submit" />
</form>

<script>
  document.getElementById("myForm").addEventListener("submit", function (e) {
    const text = document.querySelector("#myTextbox").value;
    if (text == "") {
      alert("テキストを入力してください");
      e.preventDefault(); // フォームの送信を止める
    }
  });
</script>
```

例 2: 確認メッセージの表示
このコードでは、フォームが送信される前に、「本当に送信しますか？」という確認メッセージを表示します。「キャンセル」を選んだら、event.preventDefault でフォームの送信を止めます。

```html
<form id="myForm">
  <input type="text" id="myTextbox" />
  <input type="submit" />
</form>

<script>
  document.getElementById("myForm").addEventListener("submit", function (e) {
    if (!confirm("本当に送信しますか？")) {
      e.preventDefault(); // フォームの送信を止める
    }
  });
</script>
```

## e.preventDefault()

e.preventDefault()は、ブラウザが元々持っている特定のイベントの動作を止めるための命令です。e はイベントを表し、preventDefault()はそのイベントのデフォルトの動作を防ぐ、つまり止めるという意味です。
例えば、リンクをクリックしたときに新しいページに移動するのがデフォルトの動作ですが、e.preventDefault()を使うとその動作を止めることができます。

例 1: リンクのクリック動作を止める
リンクをクリックしたときに新しいページに移動するのがデフォルトの動作ですが、e.preventDefault()を使うとその動作を止めることができます。

```js
document.querySelector("a").addEventListener("click", function (e) {
  e.preventDefault();
});
```

上記のコードでは、a タグ（リンク）がクリックされたときに、e.preventDefault()が動作し、リンクをクリックしても新しいページに移動しないようになります。

例 2: フォームの送信動作を止める
上記のコードでは、form タグ（フォーム）が送信されたときに、e.preventDefault()が動作し、フォームを送信してもページがリロードされないようになります。
フォームを送信するときにページがリロードされるのがデフォルトの動作ですが、e.preventDefault()を使うとその動作を止めることができます。

```js
document.querySelector("form").addEventListener("submit", function (e) {
  e.preventDefault();
});
```

## value

value は、HTML の特定の要素（たとえば、テキストボックスやドロップダウンメニューなど）の現在の値を取得したり、新しい値を設定したりするために使います。これは、ユーザーが入力した情報を取得したり、プログラムから情報を変更したりするときにとても便利です。

```js
const element = document.getElementById("myText");
const value = element.value;
```

例 1: ユーザーが入力したテキストを取得する
ユーザーがテキストボックスに何かを入力したとき、その入力内容を取得することができます。

```js
const textBox = document.getElementById("myTextBox");
const userInput = textBox.value;
```

このコードでは、まず document.getElementById("myTextBox")で HTML のテキストボックスを取得しています。そして、そのテキストボックスの現在の値（ユーザーが入力したテキスト）を value を使って取得し、userInput という変数に保存しています。

例 2: プログラムからテキストボックスの値を変更する
value を使って、プログラムからテキストボックスの値を変更することもできます。

```js
const textBox = document.getElementById("myTextBox");
textBox.value = "新しい値";
```

このコードでは、まず document.getElementById("myTextBox")で HTML のテキストボックスを取得しています。そして、そのテキストボックスの値を value を使って"新しい値"に変更しています。これにより、テキストボックスには"新しい値"と表示されます。

## HTMLFormElement.reset()

HTMLFormElement.reset()は、フォームの入力フィールドを初期状態に戻すために使います。

```js
formElement.reset();
```

例 1: フォームのリセットボタンを作る

```html
<p>好きな食べ物を3つ入力してください。</p>
<form id="myForm">
  <input type="text" name="1つ目" placeholder="1つ目" />
  <input type="text" name="2つ目" placeholder="2つ目" />
  <input type="text" name="3つ目" placeholder="3つ目" />
  <button id="resetButton">リセット</button>
</form>

<script>
  document.getElementById("resetButton").addEventListener("click", function () {
    document.getElementById("myForm").reset();
  });
</script>
```

このコードでは、まず document.getElementById('resetButton')でリセットボタンを取得し、実行する関数を設定しています。
その中で document.getElementById('myForm').reset();を実行して、フォームの入力フィールドを全て初期状態に戻しています。

## disabled

disabled は、フォーム要素（ボタンやテキストボックスなど）を無効化します。
true に設定されていると、その要素はユーザーからの操作を受け付けなくなります。

例 1: ボタンを無効化する
ユーザーが何かを入力する前に、ボタンを押せないようにするために disabled を使います。

```html
<button id="myButton">押せません</button>

<script>
  const button = document.getElementById("myButton");
  button.disabled = true;
</script>
```

このコードでは、myButton という ID を持つボタンを button.disabled = true とすることで、無効化しています。

## mouseout イベント

mouseout イベントは、マウスカーソルが特定の要素から離れたときに発生します。

```js
element.addEventListener("mouseout", function () {
  // ここに、マウスが要素から離れたときに行う処理を書く
});
```

例 1: ボタンからマウスが離れたときに色を変える

```html
<button id="myButton">マウスが離れると青色になるよ！</button>

<script>
  const button = document.getElementById("myButton");
  button.addEventListener("mouseout", function () {
    button.style.backgroundColor = "blue";
  });
</script>
```

このコードでは、myButton という ID を持つボタンからマウスが離れたときに、ボタンの背景色を青に変えるように指示しています。

例 2: マウスが画像から離れたときにメッセージを表示する

```html
<img
  id="myImage"
  src="https://picsum.photos/id/237/200/300
"
  style="display: block;"
/>

<script>
  const image = document.getElementById("myImage");
  image.addEventListener("mouseout", function () {
    alert("バイバイ！");
  });
</script>
```

このコードでは、myImage という ID を持つ画像からマウスが離れたときに、「バイバイ！」というメッセージを表示するように指示しています。

## document.removeEventListener()

document.removeEventListener()は、特定のイベントを削除することができます。

例 1: クリックイベントリスナーを削除する

```html
<button id="myButton">クリックしても何も起こりません</button>

<script>
  const button = document.getElementById("myButton");
  const handleClick = function () {
    alert("ボタンがクリックされました！");
  };

  // ボタンにクリックイベントリスナーを追加
  button.addEventListener("click", handleClick);

  // ボタンからクリックイベントリスナーを削除
  button.removeEventListener("click", handleClick);
</script>
```

このコードでは、ボタンがクリックされたときにボタンがクリックされました！と表示されるイベントリスナーを削除しています。
これにより、ボタンをクリックしても何も起こらなくなります。

例 2: キー押下イベントリスナーを取り除く

```html
<input type="text" id="myTextbox" />

<script>
  const handleKeyPress = function (event) {
    alert("あなたが押したキー : " + event.key);
  };

  // キーボードのキー押下イベントリスナーを追加
  document.addEventListener("keydown", handleKeyPress);

  // キーボードのキー押下イベントリスナーを取り除く
  document.removeEventListener("keydown", handleKeyPress);
</script>
```

このコードでは、キーボードで押されたキーをアラートで表示するイベントリスナーを削除しています。
これにより、キーを押してもアラートは表示されません。

## scroll イベント

scroll イベントは、ユーザーがページをスクロールしたときに発生します。

```js
window.addEventListener("scroll", function () {
  // ここにスクロールしたときに行う処理を書く
});
```

例 1: スクロール位置に応じて文字色を変更する

```html
<div id="scrollElement" style="height: 100px;">
  スクロールすると文字色が変わるよ！<br />
  ↓<br />
  ↓<br />
  ↓<br />
  ↓<br />
  ↓<br />
  ↓<br />
</div>

<script>
  const scrollElement = document.getElementById("scrollElement");

  document.addEventListener("scroll", function () {
    const scrollPosition = window.scrollY;

    // スクロール位置が指定した値を超えた場合
    if (scrollPosition > 20) {
      scrollElement.style.color = "red";
    } else {
      // スクロール位置が指定した値を超えていない場合
      scrollElement.style.color = "black";
    }
  });
</script>
```

このコードでは、window.scrollY を使ってスクロールの縦位置を取得しています。スクロール位置が 20px を超えたら、文字色を赤で表示し、超えていない場合は黒で表示します。

例 2: スクロール位置に応じて要素の内容を変更する

```html
<div id="scrollElement02" style="height: 100px;">
  スクロールすると内容が変わるよ！<br />
  ↓<br />
  ↓<br />
  ↓<br />
  ↓<br />
  ↓<br />
  ↓<br />
</div>

<script>
  const scrollElement = document.getElementById("scrollElement02");

  document.addEventListener("scroll", function () {
    const scrollPosition = window.scrollY;

    // スクロール位置が指定した値を超えた場合
    if (scrollPosition > 20) {
      scrollElement.innerHTML = "内容が変わったよ！";
    }
  });
</script>
```

例 1 と同様に、window.scrollY を使ってスクロールの縦位置を取得しています。
スクロール位置が 20px を超えたら、scrollElement02 要素の内容を変更しています。

## scroll 系

説明文
window.scrollX, window.scrollY, window.scrollTo は、ウェブページ上でのスクロール位置を取得したり、特定の位置にスクロールするために使われます。
window.scrollX は、ウェブページの左端から現在の水平（横）スクロール位置までの距離をピクセルで取得します。
window.scrollY は、ウェブページの上端から現在の垂直（縦）スクロール位置までの距離をピクセルで取得します。
window.scrollTo は、指定した水平（横）と垂直（縦）の位置にウェブページをスクロールします。

```js
console.log(window.scrollX); // 現在の水平スクロール位置を表示
console.log(window.scrollY); // 現在の垂直スクロール位置を表示
window.scrollTo(0, 0); // ページの一番上にスクロール
```

例 1: スクロール位置の取得
ウェブページをスクロールしたときに、現在のスクロール位置を取得することができます。

```js
console.log("水平スクロール位置: " + window.scrollX + "px");
console.log("垂直スクロール位置: " + window.scrollY + "px");
```

このコードは、ウェブページの水平（横）と垂直（縦）のスクロール位置をピクセルで表示します。

例 2: 特定の位置へスクロール
ウェブページを特定の位置にスクロールさせることができます。

```js
window.scrollTo(0, 500); // ページの垂直位置 500px にスクロール
```

このコードは、ウェブページを垂直（縦）位置 500 ピクセルにスクロールさせます。
