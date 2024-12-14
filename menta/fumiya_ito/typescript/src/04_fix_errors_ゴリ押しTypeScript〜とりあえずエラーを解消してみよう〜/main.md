## 型アサーション(as もしくは<>)

TypeScript の型アサーションは、変数に対して型を明示的に指定して、コンパイラに対してその変数の型を教えることができる機能です。2 つの方法があり、as キーワードと<>を使って表現することができます。

```ts
// as を使った型アサーションの書き方
const name: string | undefined = "John";
const nameLength: number = (name as string).length;

// <>を使った型アサーションの書き方
const name: string | undefined = "John";
const nameLength: number = (<string>name).length;
```

例 1: ユニオン型の値を、string 型に型アサーションを行う

```ts
const names: string | undefined = "John";
const upperCaseName = (names as string).toUpperCase();
console.log(upperCaseName); // 'JOHN'
```

例 2: 空のオブジェクトに型アサーションを行う

```ts
interface SampleType {
  text: string;
}
let sampleValue = {} as SampleType;
sampleValue.text = "テキスト";
```

例 3: id 属性が'button'の要素に型アサーションを行う

```ts
const button = document.getElementById("button") as HTMLInputElement;
```

## !(Non null assertion operator)

undefined か null の可能性があるものに対して null、undefined でないことを宣言できる。

例 1: undefined を含んだユニオン型で、undefined ではないことを明示する

```ts
const sampleFunction = (sampleInput: string | undefined) => {
  const upperCase = sampleInput!.toUpperCase();
  console.log(upperCase);
};
sampleFunction("abc");
```

例 2: id 属性に'button'を持つ要素が、null や undefined ではないことを明示する

```ts
const clickButton = () => {
  document.getElementById("button")!.click();
};
clickButton();
```

## ?(optional chaining)

undefined か null の可能性があるプロパティにアクセスしようとした際に、エラーを防ぐことができる。

例 1: 存在しないプロパティにアクセスして undefined を出力します

```ts
const sampleFunction = (user: any) => {
  console.log(user.name?.value);
};
sampleFunction({ age: 20 });
// undefined
```
