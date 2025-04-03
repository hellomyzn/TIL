## data-target
data-targetはHTMLの中で使われる特別な属性です。
これは、ウェブページの中で特定の部分を指し示すために使います。

例1: タブの切り替え
ウェブページには、タブを使って情報を分けて表示することがあります。
data-targetを使って、どのタブの内容を表示するかを指定することができます。

```html
<!-- タブのボタン -->
<ul class="nav-tabs">
  <li><a class="tab-button" data-target="#menu1">メニュー 1</a></li>
  <li><a class="tab-button" data-target="#menu2">メニュー 2</a></li>
</ul>

<!-- タブの内容 -->
<div id="menu1" class="tab-menu active">
  <h3>メニュー 1</h3>
  <p>メニュー 1 の内容がここに入ります。</p>
</div>
<div id="menu2" class="tab-menu">
  <h3>メニュー 2</h3>
  <p>メニュー 2 の内容がここに入ります。</p>
</div>

<style>
.nav-tabs {
    list-style-type: none;
    display: flex;
    gap: 10px;
    padding-left: 0;
}
.tab-button {
    padding: 10px 15px;
    cursor: pointer;
    background-color: #f1f1f1;
    border: none;
    border-radius: 16px;
    outline: none;
    transition: background-color 0.3s, border-color 0.3s;
}

.tab-menu {
    display: none;
    padding: 20px;
    border-top: 1px solid #ccc;
}
.tab-menu.active {
    display: block;
}

.tab-button.active {
    background-color: #87cefa;
}
</style>

<script>
const tabs = document.querySelectorAll('.tab-button');
tabs.forEach(tab => {
  tab.addEventListener('click', (e) => {
    const menu = e.currentTarget.getAttribute('data-target');
    const allMenus = document.querySelectorAll('.tab-menu');
    const targetMenu = document.querySelector(menu);

    // すべてのタブボタンの.activeを削除
    tabs.forEach(tab => {
      tab.classList.remove('active');
    });
    allMenus.forEach(menu => {
      menu.classList.remove('active');
    });

    // クリックされたタブボタンに.activeを追加
    e.currentTarget.classList.add('active');

    // 対応するタブコンテンツに.activeを追加
    targetMenu.classList.add('active');
  });
});
</script>
```

このコードでは、タブのボタンをクリックすると、それに対応するdata-targetのIDを持つタブの内容が表示されます。
例えば、「メニュー１」のタブをクリックすると#menu1の内容が表示されるのです。


## event.currentTarget
event.currentTargetは、イベントが現在どの要素によって処理されているかを教えます。イベントが発生した要素ではなく、イベントリスナーが追加された要素を参照します。

```js
event.currentTarget
```

例1: ボタンがクリックされたときの動作を決める

```html
<button>
  クリックしてね！
</button>

<script>
  document.querySelector('button').addEventListener('click', (event) => {
    alert(event.currentTarget);
  });
</script>
```
このコードは、ボタンがクリックされたときに、クリックされたボタンの情報をアラートで表示します。event.currentTargetは、クリックイベントが追加されたボタンを指します。