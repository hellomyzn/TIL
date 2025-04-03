## in

オブジェクト内にあるプロパティやメソッドを絞り込むことができる。

例 1: プロパティの有無によって条件分岐を行います

```ts
interface Tweet {
  likedCount: number;
}
interface User {
  name: string;
}

const getData = (input: Tweet | User) => {
  if ("likedCount" in input) {
    return `いいね数: ${input.likedCount}`;
  } else {
    return `ユーザー名: ${input.name}`;
  }
};

const tweet: Tweet = {
  likedCount: 100,
};
console.log(getData(tweet));
// 'いいね数: 100'

const user: User = {
  name: "Taro",
};
console.log(getData(user));
// 'ユーザー名: Taro'
```

## instanceof(TypeScript)

あるオブジェクトが指定したクラスのインスタンスであるかどうかを判定するために使用されます。

```ts
例1: どのクラスのインスタンスか判定します;
class Dog {
  constructor(public name: string) {}
}

class Cat {
  constructor(public name: string) {}
}

const myDog = new Dog("ポチ");
console.log(myDog instanceof Dog); // true

const myCat = new Cat("たま");
console.log(myCat instanceof Dog); // false
```

例 2: インスタンスを絞り込んで、文字列を出力します

```ts
class Dog {
  constructor(public name: string) {}
}

class Cat {
  constructor(public name: string) {}
}

const isDog = (pet: Dog | Cat): void => {
  if (pet instanceof Dog) {
    console.log("犬です");
  } else {
    console.log("犬ではありません");
  }
};

const myDog = new Dog("ポチ");
isDog(myDog); // '犬です'

const myCat = new Cat("たま");
isDog(myCat); // '犬ではありません'
```

## is

関数の返り値が true と判定される場合に、引数が is 演算子で指定した型であると判定します。

```
引数 is 型名
```

例 1: 返り値が true の場合に、引数の型が string であると判定します

```ts
const isString = (text: unknown): text is string => {
  return typeof text === "string";
};

const upperCase = (text: unknown) => {
  if (isString(text)) {
    return text.toUpperCase();
  } else {
    return text;
  }
};

console.log(upperCase("abc")); // 'ABC'
console.log(upperCase(123)); // 123
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

## ?(optional property)

?(optional property)は、TypeScript のオブジェクトのプロパティを定義する際に使用される構文です。この構文を使うことで、プロパティが存在しない場合でもエラーが発生せず、安全にアクセスすることができます。

例 1: age プロパティをオプションに指定します

```ts
interface Person {
  name: string;
  age?: number;
}
```

例 2: プロパティが存在する場合にのみ処理を実行します

```ts
interface Person {
  name: string;
  age?: number;
}

const greet = (person: Person) => {
  console.log(`Hello, ${person.name}!`);
  if (person.age) {
    console.log(`You are ${person.age} years old.`);
  }
};

greet({ name: "Alice", age: 25 });
// 'Hello, Alice!'
// 'You are 25 years old.'

greet({ name: "Bob" });
// 'Hello, Bob!'
```

## unknown 型

unknown 型は、値が不明な場合に使用します。具体的な型を指定せず、実行時に値の型をチェックする必要がある場合に使用されます。

例 1: unknown 型の変数を定義して、様々な値を代入します

```ts
let something: unknown = 10;
something = "Hello";
something = true;
```

例 2: 値の型を絞り込んでから処理を行います;

```ts
const printValue = (value: unknown) => {
  if (typeof value === "string") {
    console.log("stringです");
  } else if (typeof value === "number") {
    console.log("numberです");
  } else {
    console.log("stringでもnumberでもありません");
  }
};

printValue("Hello"); // stringです
printValue(10); // numberです
printValue(true); // stringでもnumberでもありません
```

## typeof(TypeScript)

指定された値の型を取得するために使用されます。

例 1: 様々な値の型を取得します

```ts
console.log(typeof "Hello World"); // 'string'

console.log(typeof true); // 'boolean'

console.log(typeof 100); // 'number'

console.log(typeof [1, 2, 3]); // 'object'

console.log(typeof { name: "Taro", age: 28 }); // 'object'

console.log(typeof null); // 'object'

console.log(typeof undefined); // 'undefined'

console.log(
  typeof (() => {
    console.log("Hello World");
  })
); // 'function'
```

例 2: 型を絞り込んで、文字列型のみ大文字に変換します

```ts
const message = (input: any) => {
  if (typeof input === "string") {
    return input.toUpperCase();
  } else {
    return input;
  }
};

console.log(message("hello")); // 'HELLO'
console.log(message(123)); // 123
```
