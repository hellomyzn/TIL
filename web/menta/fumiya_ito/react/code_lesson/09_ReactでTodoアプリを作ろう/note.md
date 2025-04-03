## リストのレンダー

データの配列からリストを生成して表示するために、JavaScriptのmapメソッドを使います。

使い方
①必要なデータを基に配列を作成する
②mapメソッドを使って、①の配列を基にJSX要素を生成する
※生成する要素の一番親のJSX要素にはkeyを設定する

key
keyは、Reactが配列のどの要素がどのJSX要素に対応するのかを判断するために必要です。また、keyは一意である必要があります。そうすることで、変更があった場合に正しく更新を反映させることができます。
配列のインデックスをkeyとして使用するとバグの原因になる可能性があります。配列の要素が挿入されたり削除されたり並び替えられたりすると順番が変わるからです。

例1 メッセージのリストを表示する
```jsx
//配列messages
const messages = [
  { id: 1, content: 'one' },
  { id: 2, content: 'two' },
  { id: 3, content: 'three' },
  { id: 4, content: 'four' },
  { id: 5, content: 'five' }
]

// keyにidを使う場合
return messages.map((message) =>
  <li key={message.id}>{message.content}</li>
)

// keyに配列のインデックスを使う場合
return messages.map((message, index) =>
  <li key={index}>{message.content}</li>
)
```


## stateの更新+スプレッド構文

スプレッド構文：配列やオブジェクトの内容を展開できる。
stateが配列である時の要素の追加や、stateがオブジェクトである時の特定のプロパティの値の更新のためにスプレッド構文を利用する。

実装例
```jsx
/** 配列の場合 */
const [sweetsList, setSweetsList] = useState(["cake", "caramel"])
console.log(sweetsList) //["cake", "caramel"]

// 要素を追加する
setSweetsList([...sweetsList, "cookie"])
console.log(sweetsList) //["cake", "caramel", "cookie"]
```
```jsx
/** オブジェクトの場合 */
const [user, setUser] = useState({
  name: "Takeshi",
  age: 25
})
console.log(user) //{ name: "Takeshi", age: 25 }

// 1. 一部のプロパティのみを上書きする場合
setUser({
  ...user,  //現在のuser（nameがTakeshi、ageが25）の中身を展開して代入
  age: 30 //ageプロパティを更新
})
console.log(user) //{ name: "Takeshi", age: 30 }

// 2. 新たにプロパティを追加する場合
setUser({
  ...user,  //現在のuser（nameがTakeshi、ageが25）の中身を展開して代入
  gender: "male" genderプロパティを追加
})
console.log(user) //{ name: "Takeshi", age: 25, gender: "male" }
```