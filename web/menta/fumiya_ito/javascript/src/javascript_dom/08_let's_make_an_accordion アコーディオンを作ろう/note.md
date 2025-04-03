## カスタムデータ属性
スライドで学ぼう！

HTMLのカスタムデータ属性とは、自分で作った特別な情報をHTML要素に追加するためのものです。これは、ウェブページがどのように動作するかを制御するためにJavaScriptから使用されます。
カスタムデータ属性はdata-で始まる名前を持ちます。例えば、data-myattributeのようになります。

```html
<div data-myattribute="somevalue">ここに何かを書く</div>
```

例1:情報の保存と取得
カスタムデータ属性は、HTML要素に関連する情報を保存し、後でJavaScriptで取得するために使います。
```html
<div id="myDiv" data-myattribute="somevalue">ここに何かを書く</div>

<script>
  var div = document.getElementById('myDiv');
  var value = div.getAttribute('data-myattribute'); // "somevalue"を取得
</script>
```

上記のコードでは、まずdata-myattributeというカスタムデータ属性を作り、その値に"somevalue"を設定しています。次に、JavaScriptを使ってその値を取得しています。

例2:要素の状態の追跡
カスタムデータ属性は、HTML要素の状態（例えば、ボタンが押されたかどうか）を追跡するためにも使えます。

```html
<button id="myButton" data-clicked="false">クリックしてみて！</button>

<script>
  var button = document.getElementById('myButton');
  button.onclick = function() {
    var clicked = button.getAttribute('data-clicked'); // "false"を取得
    if (clicked === "false") {
      button.setAttribute('data-clicked', "true"); // "true"に変更
    }
  }
</script>
```
上記のコードでは、ボタンがクリックされたかどうかを追跡しています。ボタンがクリックされると、data-clicked属性の値が"false"から"true"に変更されます。


## max-height

CSSのmax-heightは、要素の最大の高さを指定するプロパティです。
要素が指定した高さを超える場合、スクロールバーが表示されます。

例えば、以下のように記述することで、高さが200pxを超える場合はスクロールバーが表示されるようになります。
スクロールバーを表示させるためには、max-heightとoverflow-yの両方を指定する必要があります。
```html
<style>
p {
  max-height: 100px;
  overflow-y: auto;
}
</style>

<p class="text">
吾輩は猫である。名前はまだ無い。どこで生れたかとんと見当がつかぬ。何でも薄暗いじめじめした所でニヤーニヤー泣いてゐた事だけは記憶してゐる。吾輩はここで始めて人間といふものを見た。しかもあとで聞くとそれは書生といふ人間中で一番獰悪な種族であつたさうだ。この書生といふのは時々我々を捕へて煮て食ふといふ話である。しかしその当時は何といふ考へもなかつたから別段恐しいとも思はなかつた。
</p>
```

例1: モーダルウィンドウの高さを制限します
モーダルウィンドウは、画面上に浮かび上がるウィンドウのことで、通常は画面の中央に表示されます。
しかし、モーダルウィンドウの高さが画面の高さを超えてしまうと、スクロールバーが表示されずにウィンドウの下部が見えなくなってしまいます。
そこで、max-heightを使用して、ウィンドウの高さを画面の高さ以下に制限することができます。

```css
.modal {
  max-height: calc(100vh - 100px);
  overflow-y: auto;
}
```
上記の例では、100vhから100pxを引いた値をmax-heightとして指定しています。これにより、ウィンドウの高さが画面の高さを超えることがなくなります。

例2: テキストエリアの高さを制限します
テキストエリアは、複数行のテキストを入力するための要素です。
しかし、テキストエリアの高さが指定しない場合、入力されたテキストがエリアからはみ出してしまうことがあります。
そこで、max-heightを使用して、テキストエリアの高さを制限することができます。

```css
textarea {
  max-height: 200px;
  overflow-y: auto;
}
```
上記の例では、テキストエリアの高さが200pxを超える場合はスクロールバーが表示されるようになります。
これにより、テキストエリアの高さが指定された値以下に制限されます。


## overflow
CSSのoverflowは、要素の内容が指定した領域を超えた場合にどのように表示するかを指定するプロパティです。


```css
overflow: visible | hidden | scroll | auto;
```
- visible：要素の外側にはみ出しても表示します。
- hidden：要素の外側にはみ出した部分を非表示にします。
- scroll：要素の外側にはみ出した部分をスクロールバーで表示します。
- auto：必要に応じてスクロールバーを表示します。

例1: コンテンツがはみ出した場合に非表示にする

```html
<style>
.container {
  width: 400px;
  height: 100px;
  overflow: hidden;
}
</style>

<div class="container">吾輩は猫である。名前はまだ無い。どこで生れたかとんと見当がつかぬ。何でも薄暗いじめじめした所でニヤーニヤー泣いてゐた事だけは記憶してゐる。吾輩はここで始めて人間といふものを見た。しかもあとで聞くとそれは書生といふ人間中で一番獰悪な種族であつたさうだ。この書生といふのは時々我々を捕へて煮て食ふといふ話である。しかしその当時は何といふ考へもなかつたから別段恐しいとも思はなかつた。
</div>
```

この例では、幅400px、高さ100pxの領域に収まるように指定された.container要素の中に、コンテンツがはみ出した場合には非表示になります。

例2: コンテンツがはみ出した場合にスクロールバーを表示する
```html
<style>
.container {
  width: 400px;
  height: 100px;
  overflow: scroll;
}
</style>

<div class="container">吾輩は猫である。名前はまだ無い。どこで生れたかとんと見当がつかぬ。何でも薄暗いじめじめした所でニヤーニヤー泣いてゐた事だけは記憶してゐる。吾輩はここで始めて人間といふものを見た。しかもあとで聞くとそれは書生といふ人間中で一番獰悪な種族であつたさうだ。この書生といふのは時々我々を捕へて煮て食ふといふ話である。しかしその当時は何といふ考へもなかつたから別段恐しいとも思はなかつた。
</div>
```
この例では、幅400px、高さ100pxの領域に収まるように指定された.container要素の中に、コンテンツがはみ出した場合にはスクロールバーが表示されます。


## element.scrollHeight
element.scrollHeightは、要素の全体の高さをピクセル単位で返すプロパティです。要素がスクロール可能な場合、この高さは見えない部分を含む全体の高さとなります。

例1: コンテンツの高さを合わせる
```html
<div class="accordion-item">
  <button class="accordion-btn" data-target="content1">クリックすると…</button>
  <div id="content1" class="accordion-content">
    <p>アコーディオンが開きます。</p>
    <p>アコーディオンが開きます。</p>
  </div>
</div>

<style>
  .accordion-btn {
    width: 100%;
    text-align: left;
    padding: 4px 8px;
    cursor: pointer;
    font-size: 16px;
    background-color: #0000cd;
    color: #ffffff;
    border: 0;
  }

  .accordion-content {
    max-height: 0;
    overflow: hidden;
    background-color: #f5f5f5;
    font-size: 16px;
    transition: 0.2s;
  }
</style>


<script>
  const buttons = document.querySelectorAll('.accordion-btn')

buttons.forEach(button => {
  button.addEventListener('click', () => {
    const contentNo = button.getAttribute('data-target');
    const content = document.getElementById(contentNo);
    if (content.style.maxHeight) { //コンテンツの高さが存在する場合、コンテンツを非表示にする
      content.style.maxHeight = null;  
    } else {  //コンテンツの高さが存在しない場合、コンテンツを表示させる
      content.style.maxHeight = content.scrollHeight + 'px';
    } 
  });
});
</script>
```
アコーディオン内のコンテンツは初めに非表示（高さ0）としています。
maxHeightは要素の最大の高さを設定するためのもので、scrollHeightは要素の全体の高さを取得するためのものです。このコードでは、ボタンをクリックすると、その要素の全体の高さ（scrollHeight）を最大の高さ（maxHeight）に設定して、要素を表示しています。