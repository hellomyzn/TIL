# HTML / CSS design lecture





## Before Actions



### Mental Map

##### Why are you interested in this book?(3 points)

- HTMLの構造の作り方、CSSの綺麗な書き方を学びたい
- 友達がオススメしていたから
-  Web designについて詳しくなりたい。



##### Why is this book important?(free)

-  HTML CSS基礎が身につくのとテクニックを学びる







### Questioning(each section)

1. - Sassは何が便利？ cssはデザイナーにとって理解しづらいものでした。これをデザイナーにでも理解できるように改良されたものがsass記法。
   - Gulpコマンドとは？  Sassをコンパイルしてサーバーを起動する(localhost3000)
2. - マークアップの効率化とは？、同じ処理をしないように、変数やmixinなどを利用して効率化する
   - !importantとは？、 : cssで詳細度を高めるために使う
   - 親参照とは？  : Sassで&を利用すると親要素を参照する
   - mixinとは？ : 処理の塊を利用するときに使う。
3. - デザインガンプとは？、 : クライアントに見せる完成見本
   - BEMとは詳しく何？、 
   - Classの命名規則について、
   - import機能とは？、
4. - Flex boxとは？、
5. - カルーセルとは？、
   - インジケーターとは？、
   - Overlay Panelとは？
6. - WebFontとは？　
   - 突発的な修正に対応する方法は何？、
   - ユーティリティclassとは？、
7. - コンポーネントごとに分けるとどんなメリット？、









### Predict(each section)

1. Sassの環境構築とSassの導入
2. HTMLとCSSの基礎
3. CSSの設計、良い書き方
4. Sassを使っての実践パート(ヘッダーなど)
5. Sassを使っての実践パート2 (メインコンテンツやフッターなど)
6. 実践的なテクニック、仕上げパート、重要そう
7. Web制作を高速化させるテクニック集













## After actions



### Important sentence 



#### Section 0

##### 設計と管理がしっかりできることによるメリット

- **やり直しが少ない** : いきなりページの上から順に作っていくのではなく、どこかで切り戻しができるように作っている。作っている途中で修正が入った場合でも全てやり直す訳ではなく、一部だけを修正することで時間を短縮している
- **再利用性** : 似たようなパーツがある場合は再利用する。コードの可読性も上がる。
- **冗長性** : ある命名規則に従ってクラス名を命名するなど、一人の人間しかわからない設計にはしない。チームの誰かが対応できるように開発を進める





#### Section 1







#### Section 2



##### lang属性を設定する

このサイトがどの言語で書かれているかを定義する。

- ```
  <html lang="ja-jp"></html>
  ```



##### IE互換モード

Internet Explorerでは互換表示というモードがある。これが設定されていないと、ユーザーが過去のバージョンを選択することができてしまう。基本的には「edge mode」で最新を使うようにする。

- ```
  <meta http-equiv="X-UA-Compotible" content="IE=Edge">
  ```



##### 文字コードはUTF-8で設定する

ブラウザがどの文字コードでWebページが書かれているか認識できる

- ```
  <meta charset="UTF-8">
  ```



##### Cssは詳細度が高いものから順番にスタイルを適用していきます

p < .text .textの方が詳細度が高い。





##### 詳細度ルール

```
全称セレクタ(全ての要素「*」セレクタ) → 要素セレクタ(div, p) → classセレクタ → idセレクタ
```



#####  !important

同じ要素セレクタ同士であれば、後に書いたものが上書きするが、!importaが記述されていると詳細度が最も高い状態にすることができる

```
p {
	color : red !important; # こちらが優先される
}

p {
	color: blue;
}
```



##### &を使って親参照する

&は地震お囲っている要素(親要素)のセレクタを参照する機能



##### 変数 

1. $を最初につけて名前をつける

2. : をつけてその変数に入れたい値を入れる

3. 変数を使いたい場所では値の部分に変数名を入れる

   ```
   $mainColor : #2576E5;
   
   header {
   	background: $mainColor;
   }
   ```



#####  mixin : cssのひとかたまりが対象になった変数のようなもの

- ```
  @mixin redText {
  	color:red;
  	font-size: 12px;
  }
  
  .text1 {
  	@include redText;
  }
  ```





#### Section 3



#####  マークアップ方法

ページの上から順にただマークアップしていくのではなく、まずは作らなくていけないものを決めて、1つ1つコンポーネントを作り、それらを組み合わせるようにサイトを作っていく。このメリットは

1. 作業量が見積もりやすい
2. 作業分担がしやすい
3. バグを直しやすい
4. コードが再利用しやすい

```
- ヘッダー
- カルーセル
- サムネイル画像付きコンテンツ
- オーバーレイパネル
- アイコン付きコンテンツ
- ニューリスト
- フッター
```



#####  CSS設計

1. BEM
2. OOCSS
3. SMACSS



#####  BEMとは

1つのサイトをコンポーネントごとに分け、それらのコンポーネントを「Block」「Element」「Modifier」の３要素に分けるのが大きな特徴。

**メリット**は

1. classの名前の付け方で迷わない。
2. 開発メンバーが入れ替わったり、新たに追加された場合、規則が不明確だったり暗黙のルールになっていると、新メンバーは最初に暗黙のルールを学んだり探すところから始めなくてはいけない。同じ品質のCSSが書けるようになる



- **Block** : そのコンポーネントの大枠。Blockの先頭の文字は大文字にする。

- **Element** : Blockの中に入る要素。タブや記事のリスト、「画像 + テキスト」などなど。Elementの最初の文字は小文字で書く。

  | パターン                 | 概要                                                     | 記述例         |
  | ------------------------ | -------------------------------------------------------- | -------------- |
  | head                     | 例えばコンポーネント内にタイトルなどがあった場合その要素 | topicBox__head |
  | body                     | コンポーネントの中心部分                                 | topicBox__body |
  | foot                     | コンポーネントの付属となるよな部分                       | topicBox__foot |
  | itemsのような複数の単語  | リストのような連続する要素を含む親要素                   | news__items    |
  | itemのような単数形の単語 | 前述の親要素に対するこ要素                               | news__item     |



- **Modifier** : BlockやElementの変化や別パターンを表現するもの。タブのUIで現在いるページだけ背景色を変えたりするときに使う(一部の変更の時)

**命名規則** : 

- Block__Element : アンダーバー２つ
- Block--Modifier : ハイフン２つ
- Block__Element--modifier

**メリット** : 

- コンポーネントとそのパーツごとにclass名がユニークになる
- セレクタの詳細度が一定に保たれる。



##### OOCSS 

「Object Oriented CSS」の略、オブジェクト指向の考え方を取り柄れたCSS設計。



##### MCSS 

「Multilayer CSS」の略、「Foundation」「Base」「Project」「Cosmetic」というレイヤー構成に分けてCSSを設計する。下層レイヤーからの上書きは禁止する。

**Fondationレイヤー**はリセットCSS、

**Baseレイヤー**には再利用できそうなパーツ(ボタンなど)、

**Projectレイヤー**にはBaseよりも具体的なパーツ、

**Cosmeticレイヤー**にはリンクカラーや余白を持たせる簡易的なClassを記述する



##### SMACSS

「Scalable and Modular Architecture for CSS」の略。「Base」「Layout」「Module」「State」「Theme」の５つのルールに分類する。

**Base** : リセットCSS

**Layout** : ページの大枠(メインカラムやサブカラムなど)

**Module** : ページ内のレイアウトに関わるもの以外の要素

**State** : JavaScriptの制御によって切り替わる要素

**Therme** : 全体のスタイルを切り替える機能を命名規則に沿って記述する。



##### フォルダ構成

``` 
- src - images
	  	- article
	  	- campaign
	  	- top
	  - js
	  	- lib
	  	- main.js
	  - scss
	  	- base
	  		- lib
	  			- _sanitize.css  # リセットcss本体
	  		- _reset.scss # リセットcssをインポートする
	  		- _variables.scss # 変数の管理をするファイル
	  	- components
	  		- common
	  			- _header.scss
	  		- parts
	  	- pages
	  	- utils
	  - main.scss # 主に他にあるファイルの読み込みをする
```



**srcフォルダ構造**

| フォルダ名 | 内容                                                         |
| ---------- | ------------------------------------------------------------ |
| base       | mixinや後述するリセットcssを入れるフォルダ                   |
| components | 先ほど定義したコンポーネントを入れるフォルダ                 |
| pages      | ページ固有のデザインが　あった場合に使用するscssフォルダ     |
| utils      | コンポーネントのルールを一時的に上書きしたい場合などに使える。ミニマルなスタイル軍を入れるフォルダ |



**componentsフォルダ**

| フォルダ名 | 内容                                                         |
| ---------- | ------------------------------------------------------------ |
| common     | コンポーネントの中でも共通となるコンポーネントを入れる。ヘッダーやフッターのようなコンポーネントはどのページも共通で使用するので、このフォルダに入れる |
| parts      | コンポーネント自体も、たとえばbuttonやフォームなど、様々な要素が組み合わさってできている。ただ、フォームやbuttonなどそれ以上コンポーネントに分けられない最小コンポーネントは本フォルダにpartsとしている。 |



**_variables.scss**

なるべくmain.scssで上の方でimportを定義しておかないと、他のファイルで定義していた場合、まだ未定義変数となりコンパイルエラーになる可能性がある。

| 変数名      | 内容                   |
| ----------- | ---------------------- |
| $color-base | 背景色                 |
| $color-main | 全体で使用する文字の色 |
| $color-link | リンク文字色           |





##### リセットCSS

https://csstools.github.io/sanitize.css/

src/scss/base/lib/senitisze.css を用意して

src/scss/base/_reset.scssで上記のリセットcssをimportして使う





##### 分割したファイルを読み込む「important機能」

1. @importとかく
2. ファイルへの相対パスを書く
3. 読み込み先のファイル名のアンダーバーは削除
4. 拡張子(.scss)は不要
5. セミコロンで終了

components/common/_header.scss

```
.header {
	color: #000;
}
```

main.scss

```
@import "./components/common/header"
```



##### HTMLの構成例

```
<!DOCTYPE html>
<html lang="ja">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Css Cafe</title>
    <link rel="stylesheet" href="./dist/css/main.min.css">
</head>
<body>
  <div id="wrapper">
    <header class="Header">
      <div class="Header__head">
        <h1>Site Name</h1>
      </div>
      <nav class="Header_body">
        <ul class="Menu">
          <li class="Menu__item"><a href="">Services</a></li>
          <li class="Menu__item"><a href="">Work</a></li>
          <li class="Menu__item"><a href="">About</a></li>
          <li class="Menu__item"><a href="">Blog</a></li>
          <li class="Menu__item"><a href="">Contact</a></li>
        </ul>
      </nav>
    </header>


    <section>
      <div class="EntryPanel">

        <div class="EntryPanel__sub">
          <img class="EntryPanel__thumb" src="./dist/images/top/entry1.jpg" alt="" width="275" height="250">
        </div>

        <div class="EntryPanel__main">
          <h3 class="EntryPanel__head">
            冬のコーヒーギフト
          </h3>
          <div class="EntryPanel__body">
            大切なあの方にありがとうを届けたい。心も体も温まる素敵なギフト。プレゼントキャンペーン実施中!
          </div>
          <div class="EntryPanel__foot">
            <a href="" class="button">READ MORE</a>
          </div>
        </div>

      </div>



      <div class="EntryPanel">
        <div class="EntryPanel__sub">
          <img class="EntryPanel__thumb" src="./dist/images/top/entry2.jpg" alt="">
        </div>

        <div class="EntryPanel__main">
          <h3 class="EntryPanel__head">
            あの人気店コラボメニュー
          </h3>
          <div class="EntryPanel__body">
            今話題の人気店、Macaro'n Thingsのパンケーキを使ったコラボ商品のセットメニューを販売中。
          </div>
          <div class="EntryPanel__foot">
            <a class="button" href="">READ MORE</a>
          </div>
        </div>
      </div>
    </section>
  </div>

</body>
</html>



```





#### Section 4

##### Flex box

「Flexible Box Layout Module」。レスポンシブなサイトを組む時にフレキシブルなレイアウトが簡単に組めるようになる非常に便利なプロパティ群。chapter4/flexbox.htmlがサンプルになる

メニューなどを横並びに書きたいのであればfloatやinline-blockを利用して横並びにしていたが、floatは解除方法が少し厄介であったり、inline-blockも綺麗に整列させるには様々なプロパティの調整をしなければいけない。

このFlexBoxは横並びに整列されるためにはとても便利。

Flex boxには「Flexコンテナ」「Flexアイテム」が存在している。

```
display:flex
```

と指定すればその要素はFlexコンテナとなり、Flexコンテナの子要素は自動的にFlexアイテムとなる。

初期値として、子要素の配置を指定するflex-directionプロパティにrowという値が指定されているから横並びになる。



##### flexプロパティ(flex: flex-grow flex-shrink flex-basis%;)

| コマンド    | 内容                                        |
| ----------- | ------------------------------------------- |
| flex-grow   | 値を0にするとその要素が拡大しないようにする |
| flex-shrink | 値を0にすると縮小もしないようにする         |
| flex-basis  |                                             |







##### レイアウトファイル

レイアウトファイルに関するものは「l-」の接頭辞をつける

**for example**

| 名前         | 内容                                                    |
| ------------ | ------------------------------------------------------- |
| l-column     | コンテンツ横全体を中央寄せに                            |
| l-row        | このクラスに含まれる子要素が横並びになる。              |
| l-harfColumn | 2カラムの設定なら全体の半分の横幅を取るように設定する。 |





####  Section 5

##### JSのファイルの読み込み位置

Javascriptをheadタグ内に書くよりbodyタグの終了タグ近くにする方が**早く描画される**

HTMLが読み込まれてからJavascriptを読み込むのか、HTMLが読み込まれてない時にJavascriptを読み込むかの違い

**headで読み込ませると**

1. headタグまでのHTMLの読み込み
2. JavaScriptの読み込みや処理を開始
3. JavaScriptの読み込みや処理を終了　＃ここまで画面になにも表示されず真っ白のまま
4. 残りのHTML/CSSの処理を開始

**bodyタグの最後に書く**

1. bodyタグまでのHTML/CSSの処理や読み込み ＃この段階でHTMLが読み込まれている
2. JavaScriptの読み込みや処理の開始
3. JavaScriptの読みや処理を終了
4. 残りのHTMLの処理



##### 擬似要素

HTML内に書いてなくても擬似的に要素があるように取り扱ってくれるものです。擬似的なものなので、HTMLではありません。DOM城には要素として存在しいます。

| 名前           | 内容                                     |
| -------------- | ---------------------------------------- |
| ::before       | 直前に要素を追加する                     |
| ::after        | 直後に要素を追加する                     |
| :hover         | マウスでhoverした場合に追加される        |
| :first-child   | 最初の要素に追加される                   |
| :last-child    | 最後の要素に追加される                   |
| :first-of-type | 指定した要素の中で最初の要素に追加される |
| :last-of-type  | 指定した要素の中で最後の要素に追加される |

最初と最後だけpaddingやmarginが違うなどがあるから、first-childやlast-childは非常に便利です。











### Discover points(each section)

1. - ATOMエディターはGithubが作っていた。
2. null
3. - BEMはロシアの検索ポータルサイトを運営するYandex社が考案したCSS設計手法
4. - :nth-child(even){} : 子要素偶数個めに処理をする。
5. ho
6. ge
7. ho







### visualizing(each section)

1. null
2. null
3. null
4. ge
5. ho
6. ge
7. ho





### Connecting

- text to text
- text to self
- text to world









### Questioning(template)

具体的な質問の方法 (twitterであげられくらいの長さ) or 一言でおk

1. この本の問題意識、解決方法は何か？
2. この本はどのように始まってどのように終わったか。構造を書き出す。
3. この本から何を学んだか（一行程度）
4. Key Pointとかコンセプトを書く(章ごとに分ける)
5. この本の似ている本と似ていない本をチェックする。他の本との類似点を探す
6. この本を読んだ時にどんな感覚になったか。
7. この本はなぜ重要なのか？
8. 作者は一番何が言いたいのか？
9. この本のタイトルはあっているのだろうか？キャッチコピーを作る。本のタイトルをつけ直す
10. 専門的な単語(この本のキーフレーズ)を作者は何て言っているのか？
11. 各章のサマリーを書く
12. オススメの章を考える
13. 前書きは本の全体を説明に役に立ったか。改善策があれば考える。
14. 本を面白くするために作者は何をやっているか
15. どこに賛成できるか。
16. 作者の主張の賛成できるポイントと理由を書き出す。
17. この本の特徴的な部分をかく
18. この本をいい終わり方をしているか考える
19. 説明の時で面白い例を書き出す。
20. この本で最も一番重要なセンテンスはどこか。一箇所
21. この作者がいけてると思っているであろうキーワードフレーズ(使いまわしてるフレーズ)を考える
22. 一箇所だけ一番印象的に思った場所はどこだったか考える。胸に響いたところ







### Summary(each section)

 1. GulpによるSass環境構築とcssCafeのディレクトリでGulpコマンドによるサーバー起動確認

 2. HTML、CSSの準備の解説 Cssは!importantや詳細度など

    Sassの解説、主な解説

      1. ネスト、3段以上は深くしない

      2. 共通する値は変数に入れる

      3. デザインの塊はmixinで規定し、@includeで使用する

 3. - コンポーネントをまずはBlockとして作ってみる。
    - 複雑なコンポーネントはBlockの中にBlockを作ってみる。
    - Elementは汎用的な命名をなるべく使い、どこのBlockに属するかわかりやすくする
    - 最初は見た目からコンポーネントを割り出す。
    - いろんなCSS設計。クラスの命名ルール。大文字小文字を使い分ける。
    - SRC配下のフォルダ構成の説明、分割したファイルの読み込むImport機能
    - サイトを作る前にまずはリセットCSSを実装
    - コンポーネントごとにファイルを分けて一覧できるようにする。
    - headerの中にmenuを実装するときは、Header_menuというクラス名をつけるのではなくて、Menuと、そこからBlockとして扱う。Menuの中のそれぞれのタブのクラスはMenu__itemなどにして、Menuだけで独立できるようにする。

 4. - レイアウトは極力Flexを使う
    - Flexはショートハンドの書き方になれる
    - それ以上細かくできないコンポーネントはpartsとして作る
    - MenuのSassでの設定
    - entryPanelのsassでの設定。
    - レイアウトについてはcssから分かるように「l-」をつける
    - レイアウトはコンポーネントではないのでpartsフォルダに作成する
    - Sassの四則演算をうまく使ってレイアウト整える。

 5. ho

 6. ge

 7. ho







### Vocabulary

- Gulpコマンド : GulpはSassをコンパイルしてくれるもので、gulpコマンドでサーバー起動
- !important : これを記述するとcssの詳細度を最も高めてくれる
- 親参照 : scssの親参照は&をつけることで出来る。
- mixin : 処理の塊を作るときに使う。
- デザインガンプ : サイト制作会社がクライアントに見せる完成見本のこと
- BEM : CSSの設計の一つ。Block、Element, Modifierという構成のルールにしたがってクラス名をつける
- Flex box : 簡単にグリッドデザインや横並び、中央寄せのレイアウトができる。
- カルーセル
- インジケーター : カルーセルの丸が三つ並んでるやつ、クリックすると画像が指定される
- Overlay panel
- WebFront
- ユーティリティclass







