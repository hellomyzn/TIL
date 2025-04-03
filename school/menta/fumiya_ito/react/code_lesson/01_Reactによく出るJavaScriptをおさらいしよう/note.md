## 分割代入(React)
「分割代入」とは、オブジェクトや配列から値を取り出して別個の変数に代入するための方法です。

オブジェクトの分割代入
「オブジェクトの分割代入」とは、オブジェクトを分割（分解）し、プロパティを取り出して、個別の変数に代入することです。

```jsx
const myFavoriteAnimal = {
  name: 'ロッキー',
  type: 'dog'
}

// オブジェクトの分割代入
const { name, type} = myFavoriteAnimal

// 分割代入を使用した結果
console.log(name) // 'ロッキー'
console.log(type) // 'dog'
```

配列の分割代入
「配列の分割代入」とは、変数定義の右辺に配列を、左辺に配列の値を代入したい変数名を書きます。
基本的に、右辺の配列の要素は、左辺の対応するインデックスをもつ変数に代入されます。

```jsx
// 配列の定義
const myFavoriteAnimal = ['ロッキー', 'dog']

// 配列の分割代入
const [name, type] = myFavoriteAnimal

// 分割代入を使用した結果
console.log(name) // 'ロッキー'
console.log(type) // 'dog'
```

インデックスの途中までしか必要ない場合は、以降の要素を省略できます。
配列のインデックス（index）とは、配列の要素の順番を指します。
配列の先頭の要素を0番目とし、要素が増えるごとにインデックスも1,2,3,..。と増えていきます。

```jsx
// 1つ目のみ必要な場合は以下のように指定できます。
const [name] = myFavoriteAnimal
console.log(name) // 'ロッキー'
```