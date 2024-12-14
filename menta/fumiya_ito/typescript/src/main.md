## 引数・返り値の型定義

関数の引数、返り値の型を定義することができます。
引数は型推論されないので最優先で型注釈する必要があります。

引数と返り値の型

```ts
const 関数名 = (引数: 引数の型): 返り値の型 => {
  // 処理
};
```

関数の型定義構文

```ts
type 関数型名 = (引数: 引数の型) => 返り値の型;
```

例 1: 関数の引数と返り値に型を定義する

```ts
// 引数に2つの数値を受け取り、その合計値を返す関数
const sum = (num1: number, num2: number): number => {
  return num1 + num2;
};
```

例 2: type を使って関数の引数と返り値の型を定義する

```ts
type FuncType = (num: number) => number;

// 引数に1つの数値を受け取り、2倍した値を返す関数
const double: FuncType = (num) => {
  return num * 2;
};
```

## 型ガード

条件文を用いて、型を絞り込んでいく方法のこと。
instanceof,typeof,in 等がある。

```ts
instanceof, typeof, in の項目を参照。
```
