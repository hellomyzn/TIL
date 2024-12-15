## ジェネリクス

ジェネリクスは、型をパラメータとして受け取り、その型を使用してコードを書くことができる機能です。これにより、同じロジックを異なる型で再利用することができます。
ジェネリクスを使用することで汎用的で柔軟な型を作成することができます。
一般的には type の頭文字である「T」を用いることが多いです。

例 1: 関数の引数と返り値に動的な型を指定する

```ts
const checkValue = <T>(value: T): T => {
  return value;
};

console.log(checkValue("Hello")); // 'Hello'
console.log(checkValue(32)); // 32
console.log(checkValue({ name: "Taro" })); // { name: 'Taro' }

// ※型を明示的に指定する場合
console.log(checkValue<string>("Hello")); // 'Hello'
console.log(checkValue<number>(32)); // 32
console.log(checkValue<{ name: string }>({ name: "Taro" }));
// { name: 'Taro' }
```

例 2: インターフェイスのプロパティに動的な型を指定する

```ts
interface User<T, K> {
  name: T;
  age: K;
}

const user: User<string, number> = {
  name: "Taro",
  age: 10,
};
```

## Partial<T>

Partial は、オブジェクト型のすべてのプロパティを省略可能にすることができます。これは、ある型の一部のプロパティだけを持つオブジェクトを作成したい場合などに非常に役立ちます。

```ts
// Tというオブジェクト型のプロパティを省略可能にした型を生成
Partial<T>;
```

例 1: User 型のすべてのプロパティを省略可能にする

```ts
interface User {
  name: string;
  age: number;
}
type PartialUser = Partial<User>;

/*
type PartialUser = {
  name?: string
  age?: number
}
*/
```

## Required<T>

Required は、オブジェクト型のすべてのプロパティを必須にすることができます。これは、例えばユーザー情報を扱う際に、名前と年齢の両方が必ず存在することを保証したい場合などに使います。

```ts
// Tというオブジェクト型のプロパティを必須にした型を生成
Required<T>;
```

例 1: User 型のすべてのプロパティを必須にする

```ts
interface User {
  name?: string;
  age?: number;
}

type RequiredUser = Required<User>;

/*
type RequiredUser = {
  name: string
  age: number
}
*/
```

## Pick<T, K>

Pick は、指定したプロパティのみを取り出すことができます。オブジェクトの一部のプロパティのみを持つ新しい型を作成する際に使われます。

```ts
// Tというオブジェクト型からKというプロパティを選択して型を生成
Pick<T, K>;
```

例 1: Person 型から name を選択する

```ts
interface Person {
  name: string;
  age: number;
  work: string;
  income: number;
}

type Child = Pick<Person, "name">;

const mySon: Child = {
  name: "taro",
};
```

例 2: Person 型から name と age を選択する

```ts
interface Person {
  name: string;
  age: number;
  work: string;
  income: number;
}

type Child = Pick<Person, "name" | "age">;

const mySon: Child = {
  name: "taro",
  age: 10,
};
```

## Omit<T, K>

Omit は、指定したプロパティを除外した型を作成します。オブジェクトの一部のプロパティを除外して新しい型を作成する際に使われます。

```ts
// T というオブジェクト型から K というプロパティを取り除いた型を生成
Omit<T, K>;
```

例 1: Person 型から income を取り除いた型を生成する

```ts
interface Person {
  name: string;
  age: number;
  work: string;
  income: number;
}

type Child = Omit<Person, "income">;

const mySon: Child = {
  name: "taro",
  age: 10,
  work: "student",
};
```

例 2: Person 型から work と income を取り除いた型を生成する

```ts
interface Person {
  name: string;
  age: number;
  work: string;
  income: number;
}

type Child = Omit<Person, "work" | "income">;

const mySon: Child = {
  name: "taro",
  age: 10,
};
```

## UtilityType を組み合わせる

複数の UtilityType を組み合わせて型を作ることができる。

例 1. blue プロパティを取得して、オプショナルを取り除いた型を取得

```ts
type Color = {
  red: number;
  blue?: number;
  green: number;
};

type RequiredBlue = Required<Pick<Color, "blue">>;
// type RequiredBlue = {
//   blue: number
// }

const color: RequiredBlue = {
  blue: 255,
};
```

例 2. green プロパティを取得して、オプショナルにした型を取得

```ts
type Color2 = {
  red: number;
  blue: number;
  green: number;
};

type OptionalGreen = Partial<Omit<Color2, "red" | "blue">>;
// type OptionalGreen = {
//   green?: number
// }

const color2: OptionalGreen = {
  green: 255,
};
```

## Exclude<T, U>

Exclude は、1 つの型（型 T）からもう 1 つの型（型 U）に存在する項目を除外することができます。これは主に、複数の型を 1 つにまとめた「ユニオン型」に対して使われます。基本的には取り除く型を 1 つずつ指定しますが、関数の型については Function 型で一括で取り除くことができます。

```ts
// Tという型からUという型を取り除いた型を生成
type NewType = Exclude<T, U>;
```

例 1: boolean 型を取り除く

```ts
type UnionType = string | number | boolean;
type NewUnionType = Exclude<UnionType, boolean>;
// type NewUnionType = string | number

const newUnionType: NewUnionType = 1;
const newUnionType2: NewUnionType = "Hello";
```

例 2: orange 型と cherry 型を取り除く

```ts
type Fruit = "apple" | "orange" | "cherry";
type NewFruit = Exclude<Fruit, "orange" | "cherry">;
// type NewFruit = 'apple'

const newFruit: NewFruit = "apple";
```

例 3: 関数型を取り除く

```ts
type Hoge = number | boolean | (() => void) | (() => number);
type NotFunction = Exclude<Hoge, Function>;
// type NotFunction = number | boolean

const notFunction: NotFunction = 1;
const notFunction2: NotFunction = true;
```

## Extract<T, U>

Extract は、1 つの型（型 T）ともう 1 つの型（型 U）の両方に存在する項目を抽出することができます。これは主に、複数の型を 1 つにまとめた「ユニオン型」に対して使われます。基本的には 1 つずつ項目を指定しますが、関数の型は Function 型で一括で指定することができます。

```ts
// T という型と U という型に共通する型を生成
type Extract<T, U>
```

例 1: string 型と boolean 型を取り出す

```ts
type UnionType = string | number | boolean;
type NewUnionType = Extract<UnionType, string | boolean>;
// type NewUnionType = string | boolean

const newUnionType: NewUnionType = "Hello";
const newUnionType2: NewUnionType = true;
```

例 2: 関数型を取り出す

```ts
// 数値型、真偽値型、戻り値のない関数型、戻り値が数値型の関数型を持つユニオン型
type Hoge = number | boolean | (() => void) | (() => number);
type IsFunction = Extract<Hoge, Function>;
// type IsFunction = (() => void) | (() => number)

const normalFunction: IsFunction = () => console.log("hoge");
const numberFunction: IsFunction = () => 200;
```

例 3: オブジェクトの型を取り出す

```ts
type Person =
  | {
      type: "student";
      name: string;
      grade: number;
    }
  | {
      type: "teacher";
      age: number;
      subject: string;
    };

type Student = Extract<Person, { type: "student" }>;
// type Student = {
// type: 'student'
// name: string
// grade: number
// }

const student: Student = {
  type: "student",
  name: "Taro",
  grade: 1,
};
```

## Readonly<T>

Readonly は、オブジェクトのすべてのプロパティを読み取り専用にします。読み取り専用のプロパティの値は変更することができなくなります。

例 1: User 型のプロパティを読み取り専用にする

```ts
interface User {
  name: string;
  age?: number;
}

type NotChangeUser = Readonly<User>;

/*
type NotChangeUser = {
  readonly name: string;
  readonly age?: number;
}
*/

// 以下はエラーとなる
const user: NotChangeUser = {
  name: "tanaka",
  age: 25,
};
user.name = "suzuki";
```

## NonNullable<T>

NonNullable は、与えられた型から null と undefined を取り除きます。

例 1: Hoge 型から null と undefined を取り除く

```ts
file_logo_reactコード例.tsx;
type Hoge = string | number | null | undefined;

type Fuga = NonNullable<Hoge>;
// type Fuga = string | number

// 以下はエラーとなる
const piyo: Fuga = undefined;
```

## Parameters

Parameters は、関数の引数の型を取得することができます。生成される型はタプル型となります。

```ts
// Tという関数型から引数の型を生成
Parameters<T>;
```

例 1: string と number のタプル型を生成する

```ts
// 文字列型と数値型を引数にとる関数
const createMessage = (name: string, age: number) => {
  return `${name}さんは${age}歳です`;
};

// createMessage関数から引数の型を取得した型
type Hoge = Parameters<typeof createMessage>;
// type Hoge = [string, number]

// 以下はエラーとなる
const foo: Hoge = [20, "taro"];
// 以下はエラーとならない
const bar: Hoge = ["taro", 20];
```

## ReturnType

ReturnType は、関数の戻り値の型を取得することができます。

```ts
// Tという関数型から戻り値の型を生成
ReturnType<T>;
```

例 1: 関数 fullName の戻り値の型を取得する

```ts
const fullName = (last: string, first: string): string => `${last} ${first}`;

// fullName関数の戻り値の型
type Hoge = ReturnType<typeof fullName>;

// 以下はエラーとなる
const foo: Hoge = 12345;
// 以下はエラーとならない
const bar: Hoge = "bar";
```
