## import文
import文はJavaScriptの機能で、他のファイルやモジュールを読み込むことができます。

使い方
- 名前付きエクスポート（Named Exports）された関数や変数をimportする場合は、{}で囲んで記述します。
- デフォルトエクスポート（Default Export）された関数や変数をimportする場合は、{}で囲わずに記述します。

エクスポートについて
名前付きエクスポート（Named Exports）は、ファイルから複数の要素（関数、オブジェクト、値など）をエクスポートできます。
デフォルトエクスポート（Default Export）は、各ファイルから1つだけエクスポートできる特別なエクスポートです。

例1: ReactDOMをimportする
```js
import ReactDOM from 'react-dom'
```

例2: useStateをimportする

```js
import { useState } from 'react'
```

## createRoot/root.render

※React 18から導入されました。React 18の新機能を使うために必要です。
※React 18では環境構築を行う際に自動で設定されます。

createRoot
createRootは、ブラウザのDOMノード（HTML要素）内にReactコンポーネントを表示する（HTMLとして表示する）ためのルートを作成するために使います。
基本的には、id属性が'root'のHTML要素を指定します。

```jsx
import { createRoot } from 'react-dom/client'

const domNode = document.getElementById('root')
const root = createRoot(domNode)
```

root.render
ルートを作成したらReactコンポーネントを表示させる必要があります。そのためにroot.renderを呼び出します。

```jsx
root.render(<App />)
```
表示させるReactコンポーネントには、基本的にAppコンポーネントを指定します。Appコンポーネントは、アプリケーションのルートコンポーネントとなることが多く、その他のコンポーネントは通常Appコンポーネントの中に記述されます。

使い方
ブラウザのDOMノード内にReactコンポーネントを表示するには以下のように記述します。

```jsx
import { createRoot } from 'react-dom/client'
import App from './App.js'

const root = createRoot(document.getElementById('root'))
root.render(<App />)
```

## JSX

JavaScript XMLの略称です。JavaScriptのエクステンションであり、コンパイル時にはJavaScriptへ変換されます。HTMLとほとんど同じように記述できて、HTMLタグを使用できます。そのため、JavaScriptの中で直感的にUIを記述することができます。

使い方
cssのクラス名はclassNameと書く
for属性はhtmlForと書く
閉じタグがないタグでは、スラッシュを付ける（例： <br />）
複数のDOM要素を含むときは、子要素全体を1つの親要素か、React.fragment(<></>)でラップする

```jsx
/* JSXを使わない場合 */
const CustomList = () => {
  return React.createElement( 
    'ul',
    null,
    React.createElement('li', null, 'foofoo'),
    React.createElement('li', null, 'barbar')
  );
}
file_logo_reactコード例.jsx
/* JSXを使う場合 */
const CustomList = () => {
  return (
    <ul>
      <li>foofoo</li>
      <li>barbar</li>
    </ul>
  );
}

// JavaScriptのコードを記述する
const profileCard = () => {
  const userName = '太郎'
  const handleLogOut = () => {
    // ログアウト時の処理...
  }
  return (
    <>
      <h1>Hello {userName}</h1>
      <button　onClick={handleLogOut}>ログアウト</button>
    </>
  )
}

// 別ファイルで定義したcssを適用する
const App = () => {
  return(
    <p className='loading'>...ローディング中</p>
  )
}
```

## <React.Fragment>,<>

子要素をまとめるための表記です。JSXを記述する際は、1つの親要素かフラグメントを使って全てのタグをまとめて括る必要があります。
不要な親要素（divタグ）をDOMに出力したくない場合はフラグメントを使用してください。

```jsx
//  <React.Fragment>を使う場合
const Component = () => {
   return (
       <React.Fragment>
          <ChildA />
          <ChildB />
          <ChildC />
       </React.Fragment>
  )
}

// <>を使う場合
const Component = () => {
   return (
       <>
          <ChildA />
          <ChildB />
          <ChildC />
       </>
  )
}
```


## 関数コンポーネント

関数コンポーネントは、React要素（JSX）を返すプレーンなJavaScript関数です。JavaScriptの標準的な関数と同じような記述が可能です。

```jsx
const 関数名 = () => {
  /* Javascriptの範囲 */
  return (
    {/* JSXの範囲 */}
  )
}
```

例1 変数を使ってテキストを表示する
```jsx
const App = () => {
  const name = "山田"
  return (
        <div>
          <p>これは{name}です！</p>
        </div>
      )
  }
```

例2 他のコンポーネントを使う
```jsx
const ButtonComponent = () => {
   return <button>ボタン</button>
}

const App = () => {
  return <ButtonComponent />
}
```


## useState

useStateは、フックの1つで、プログラムが覚えておくべき情報（「状態」または「state」）を管理するために使います。たとえば、ユーザーが入力した文字や選択した色などがstateです。
stateは、基本的に最初に何か値（初期値）を設定します。
stateの値が変わると、Reactは画面を自動的に更新し（再描画または再レンダリングと言います）、最新の情報を表示します。

```jsx
const [現在のstate, stateを更新する関数]  = useState(stateの初期値)
```

例1 初期値を文字列で指定
```jsx
const [text, setText] = useState('初期値')
console.log(text) // '初期値'
```

例2 初期値を数値で指定
```jsx
const [number, setNumber] = useState(0)
console.log(number) // 0
```

例3 初期値を真偽値で指定
```jsx
const [isActive, setIsActive] = useState(true)
console.log(isActive) // true
```


## 条件付きレンダー

条件付きレンダーとは、特定の条件に応じて表示するUIを切り替える方法です。
条件にstateを使うことで、stateが更新されたときに自動的に画面の更新（再レンダリング）が行われて、UIが切り替わります。

三項演算子
ある条件が真（true）か偽（false）かによって、異なるUIを表示したい時に使います。

論理積（&&）
ある条件が真（true）の場合のみ特定のUIを表示して、それ以外の場合は何も表示したくない時に使います。

例1 ログイン状態によって表示するボタンを切り替える
```jsx
// ログイン状態を表すstate
const [isLogIn, setIsLogIn] = useState(false);

const hadleLogOutClick = () => {
  // ログイン処理
}

const handleLogInClick = () => {
  // ログアウト処理
}

return (
  <div>
    {isLogIn ? 
      <button onClick={handleLogOutClick}>ログアウト</button> 
      :
      <button onClick={handleLogInClick}>ログイン</button> 
    }
  </div>
)
```

例2 ログインしている場合のみマイページへのリンクを表示する
```jsx
// ログイン状態を表すstate
const [isLogIn, setIsLogIn] = useState(false);

return (
  <header>
    <nav>
      <a href="/">トップ</a>
      {isLoggedIn && <a href='/mypage'>マイページ</a>}
    </nav>
  </header>
  )
```

## prevState
useStateを使って定義したstateを更新するset関数は、引数に更新用関数（コールバック関数）を指定できます。
更新用関数の引数は直前のstateとなります。引数名はstate 変数名の頭文字 1文字を利用することが一般的ですが、prevStateのように接頭辞にprevを付与することもあります。

```jsx
const [count, setCount] = useState(1)
const handleClick = () => {
    if (count < 10) {
      setCount((prevCount) => prevCount + 1)
    }
  }
```

注意点
以下のstateを定義すると仮定します。

```jsx
state名：count
set関数名：setCount
初期値：10
```

以下2通りの書き方には違いがあります。それぞれの特徴を理解して使いましょう。

```jsx
setCount(count + 1) 　　
file_logo_reactコード例.jsx
setCount(count + 1)
```
この書き方で同じ関数内で更新関数を2回呼び出します。

```jsx
const onClickCountUp = () => {
   setCount(count + 1)
   setCount(count + 1)
}
```
これは以下と同じことです。

```jsx
const onClickCountUp = () => {
   setCount(10 + 1)
   setCount(10+ 1)
}
```
stateはset関数を呼び出した関数内では更新されません。そのため、setCount(count + 1)は全てsetCount(11)になります。

2. setCount((prevCount) => prevCount + 1)
```jsx
setCount((prevCount) => prevCount + 1)
```

この書き方で同じ関数内で更新関数を2回呼び出します。

```jsx
const onClickCountUp = () => {
   setCount((prevCount) => prevCount + 1)
   setCount((prevCount) => prevCount + 1)
}
```
これは以下と同じことです。

```jsx
const onClickCountUp = () => {
   setCount(10 => 11)
   setCount(11 => 12)
}
```
更新用関数は処理中のstateを受け取り、次のstateを導き出します。そして、set関数により更新用関数が複数回呼ばれた場合は、まとめて処理が行われます。そのため、最終的に12に更新することができます。


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

## イベントハンドラ

イベントハンドラは、特定のイベント（ボタンのクリック、テキストボックスへの入力など）が発生したときに実行される関数です。イベントハンドラを使うと、ユーザーの操作に対応した処理を設定することができます。
以下に表で示しますが、これら以外にも存在しています。

イベントハンドラ	実行タイミング
- onChange	対象の入力欄の値が変更された時
- onClick	対象の要素をクリックした時
- onDoubleClick	対象の要素をダブルクリックした時
- onMouseMove	マウスのカーソルが移動した時
- onMouseEnter	マウスのカーソルが対象の要素の中に移動した時
- onMouseLeave	マウスのカーソルが対象の要素の外に移動した時
- onMouseDown	対象の要素の中でマウスのボタンが押された時
- onMouseUp	対象の要素の中でマウスのボタンが離された時
- onKeyDown	キーが押された時
- onKeyUp	キーが離された時
- onKeyPress	（非推奨）文字列を生成するキーが押された時
- onFocus	対象の要素がフォーカスされた時
- onBlur	対象の要素からフォーカスが外された時
- onSubmit	フォームの送信操作が実行される時
- onScroll	スクロールした時
- onLoad	必要なリソースが全て読み込まれた時
- onUnload	リソースがアンロードされる時


例1 クリックした時にアラートを表示する
```jsx
// ボタンをクリックした時に'Clicked!'とアラートを表示する
const AlertButton = () => {
  return <button onClick={() => alert('Clicked!')}>Click me</button>
}
```

例2 入力欄の入力内容を表示する
```jsx
// valueにstateを指定し、onChangeでstateを更新する
const InputForm = () => {
  const [text, setText] = useState('')
  return <input value={text} onChange={(e) => setText(e.target.value)} />
}
```


## インラインスタイル
JSXのタグ内で、style属性として使うReactでのスタイリング手法の1つです。
オブジェクト内のプロパティ名は''で囲むか、キャメルケースで記述します。

例1 文字色、背景色を指定する
```jsx
<p style={{ color: 'green', 'background-color': 'blue' }}>インラインスタイル</p>
例2 オブジェクトを個別に作成してからstyle属性に渡す
file_logo_reactコード例.jsx
const divStyle = {
  fontSize: 10,
  'margin-top':10
};

const App = () => {
  return <div style={divStyle}>React</div>;
}
```

例3 buttonタグにstyle属性を渡す
```jsx
const buttonStyle = {
    border: "none",
    borderRadius: "8px"
  };

const App = () => {
  return <button style={buttonStyle}>インラインスタイル</button>;
}
```


## useEffect

useEffectは、フックの1つで、特定の事が起こった時（たとえば、ページが開かれたときや、ユーザーが何かを変更したときなど）にプログラムが処理を実行するように指示するために使います。これを副作用と呼びます。

また、useEffectは、プログラムが覚えておくべき情報（「状態」または「state」）が変わった時にも何かを実行するように指示することができます。

使い方
useEffectを使うときは、2つの引数を書きます。

第一引数
コールバック関数です。関数内に実行したい処理を書きます。

第二引数
依存配列を使って、いつそれをするかを設定します。依存配列を使うと、次のような指示が出せます。

①ページを開いた時（初回レンダリング）だけ処理を行う
→[]を書く
②ページを開いた時または特定のstateが変わった時（再レンダリング）に処理を行う
→何も書かない
③特定のstateが変わった時（再レンダリング）だけ処理を行う
→[特定のstate名]を書く

```jsx
useEffect(() => {
  // 実行したい処理
}, [依存配列])
```

例1 初回レンダリング時のみ実行する
```jsx
// 最初にロードした時だけコンソール出力が行われる

const Sample1 = () => {
  const [count, setCount] = useState(0)

  useEffect(() => {
    console.log('useEffectが実行されました')
  })

  return (
    <div>
      <h2>カウント: {count}</h2>
      <button onClick={() => setCount(count + 1)}>+</button>
    </div>
  )
}
```

例2 毎回のレンダリング時に実行する
```jsx
// ボタンを押すたびにコンソールに出力する
const Sample2 = () => {

  const [count, changeCount] = useState(0)

  useEffect(() => {
    document.title = `You clicked ${count} times`
    console.log(`毎回のレンダー時：${count}`)
  })

  return (
    <>
      <p>{count}</p>
      <button onClick={() => changeCount(count + 1)}>クリック</button>
    </>
  )
}
```

例3 特定のstateが変わった時に実行する
```jsx
// メッセージのstateが変わった時のみコンソールに出力する
const Sample3 = () => {

  const [count, setCount] = useState(0)
  const [message, setMessage] = useState('')

  useEffect(() => {
    console.log('useEffectが実行されました')
  }, [message])

  return (
    <div>
      <h1>Learn useEffect</h1>
      <h2>Count: {count}</h2>
      <h2>Message: {message}</h2>
      <input onChange={(e) => setMessage(e.target.value)} />
      <button onClick={() => setCount(count + 1)}>+</button>
    </div>
  )
}
```

## stateの更新タイミング

stateは、setStateメソッドを使用して更新することができますが、更新されたstateを直ちに参照することはできません。
setStateメソッドによる更新が実際に反映されるのは、コンポーネントの再レンダリング後になります。
そのため、stateの更新後の値を使用して処理を行う場合は、コンポーネントの再レンダリング後に実行されるuseEffectでstateを指定し処理を実行します。

例1 スイッチボタンを押下すると'off'または'on'をコンソールに出力する
```jsx
// switchStateが'off'の状態から操作する場合
const App = () => {
  const [switchState, setSwitchState] = useState('off')

  const toggleSwitchState = () => {
    setSwitchState((prevSwitchState) => {
      if (prevSwitchState === 'off') {
        return 'on'
      } else {
        return 'off'
      }
    })
    // この時点ではswitchStateは更新されていなので'off'のまま
    console.log(switchState)
  }

  useEffect(() => {
    // 再レンダリング後にswitchStateが更新されたことを検知してから実行されるため'on'が出力される
    console.log(switchState)
  }, [switchState])

  return (
    <>
      <button onClick={toggleSwitchState}>
        スイッチ
      </button>
    </>
  )
}

```