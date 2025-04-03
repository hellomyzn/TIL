## props
propsとは、親コンポーネントから子コンポーネントに渡す情報です。そのため、子コンポーネントから親コンポーネントにpropsを渡すことはできません。
propsでは、オブジェクト・配列・文字列・ スタイル ・ イベントなどさまざまなJavaScriptで取り扱う値を渡すことができます。

使い方
親コンポーネント内の子コンポーネントを呼び出している箇所で情報を渡す

//親コンポーネントから子コンポーネントにpropsを渡す
```jsx
const App = () => {
  return (
    <div>
      <Page title={'Hello'} description={'test'} />
    </div>
  )
}
```

子コンポーネントでpropsを読み出す
```jsx
// 子コンポーネントでpropsを受け取る
const Page = (props) => {
  return (
    <>
      <h1>{props.title}</h1>
      <p>{props.description}</p>
    </>
  )
}
```
読み出すpropsに対しては積極的に分割代入を使うと良いです。

```jsx
// 引数の中で分割代入する場合
const MyComponent = ({myPropsName1, myPropsName2}) => {
  return (
    <div>props1 : {myPropsName1} props2 : {myPropsName2}</div>
  )
}

// 子コンポーネント内で変数宣言する場合
const MyComponent = (props) => {
 const { myPropsName1, myPropsName2 } = props
  return (
    <div>props1 : {myPropsName1} props2 : {myPropsName2}</div>
  )
}
```

## props.children
childrenという特殊なpropsを用いることで、親コンポーネント内で子要素を出力することが可能。SidebarやDialogのようなコンポーネントで利用される。

```jsx
// 親コンポーネントで青背景のdivタグを定義
// divの中にはchildrenを挿入
function BlueBackground(props) {
  return <div style={{ background: 'blue' }}>{props.children}</div>
}

// 子コンポーネント
function Dialog() {
  return (
    // 親コンポーネントでラップする
    <BlueBackground>
      <p>背景が青くなってる</p>
    </BlueBackground>
  )
}
```

## カスタムフック

useStateやuseEffectなどのフックを使用するとき、似たようなロジックを複数のコンポーネントで再利用したい場面があります。このような場面で、ロジックをまとめて再利用可能な形にするためのフックを「カスタムフック」といいます。
カスタムフックは、名前が use で始まる関数として定義します。これはReactの慣例であり、Lintツールなどが正しくフックの使用を検出するために必要です。

```jsx
// useStateで定義したisOnlineというstateを返すカスタムフック
function useFriendStatus(friendID) {
  const [isOnline, setIsOnline] = useState(null)

  // ...

  return isOnline
}

// useFriendStatusからisOnlineを呼び出して利用する
function FriendStatus(props) {
  const isOnline = useFriendStatus(props.friend.id)

  if (isOnline === null) {
    return 'Loading...'
  }
  return isOnline ? 'Online' : 'Offline'
}
```