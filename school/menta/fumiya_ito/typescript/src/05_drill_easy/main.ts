// boolean型
var isShow: boolean = true;
var isEditing: boolean = false;

// number型
var count: number = 15;
var num: number = 2;
var float: number = 2.33;

// string型
var firsName: string = "tarou";
var lastName: string = "Yamada";
var englishName: string = `mad`;

// プリミティブ型
var isShow: boolean = true;
var count: number = 15;
var firstName: string = "tarou";

// null型
var x: null = null;

// undefined型
var y: undefined = undefined;

// any型
var x1: any = "hello";
x1 = 1;
x1 = undefined;
x1 = [];

// never型
// var x2: never = "hello";
// x2 = 1;
// x2 = undefined;
// x2 = [];

// 型エイリアス
// 例
type IsShow = boolean;
var isShow: IsShow = true;

// 型エイリアスを使って型エラーを解消しよう
type Count = number;
var count: Count = 15;

type FirstName = string;
var firstName: FirstName = "tarou";

type LastName = string;
var lastName: LastName = "suzuki";

// 型推論
var isShow = true;
var count = 15;
var firstName = "tarou";

// 推論された型に合う値を入れてください
isShow = false;
count = 10;
firstName = "hoge";

// オブジェクト型
type Person1 = { name: string; age: number };

var taro1: Person1 = { name: "tarou", age: 30 };
var jiro1: Person1 = { name: "jiro", age: 22 };

// オブジェクト型（undefinedあり）
type Person2 = { name: string; age: number; email: string | undefined };

var taro2: Person2 = {
  name: "tarou",
  age: 30,
  email: undefined,
};
var jiro2: Person2 = {
  name: "jiro",
  age: 22,
  email: "jiro@code-lesson.com",
};

// オブジェクト型（optionalあり）
type Person3 = { name: string; age: number; email?: string };

var taro3: Person3 = { name: "tarou", age: 30 };
var jiro3: Person3 = { name: "jiro", age: 22, email: "jiro@code-lesson.com" };

// Intersection型（交差型）
type BasicInfo = {
  name: string;
  age: number;
};

type AdditionalInfo = {
  email: string;
};

var person: BasicInfo & AdditionalInfo = {
  name: "taro",
  age: 20,
  email: "taro@taro.com",
};

// 配列型
type Fruits = string[];
var fruits: Fruits = ["apple", "orange", "lemon"];

type Nums = number[];
var nums: Nums = [1, 2, 3];

// 関数の引数の型定義
var main = (num: number) => {
  return num + num;
};
console.log(main(15)); //30

// 関数の返り値の型定義
var func1 = (str: string): string => "hello" + str;
var func2 = (str: string): number => ["hello"].push(str);
var func3 = (str: string): void => console.log("hello" + str);

// 関数型
var func4: (num: number) => number = (num) => num * 2;
var func5: (num: number) => string = (num) => num + "px";

// リテラル型
type Hello = "hello";
var hello: Hello = "hello";

// ユニオン型
type NumberOrString = string | number;
var num1: NumberOrString = 1;
var str1: NumberOrString = "1";

// ユニオン型とリテラル型
type Fruit = "apple" | "orange" | "lemon"; // stringは使わない

var fruit1: Fruit = "apple";
var fruit2: Fruit = "orange";
var fruit3: Fruit = "lemon";

// readonly
type Person = {
  readonly name: string;
  readonly age: number;
  readonly email: string;
};

// 定数オブジェクト
var LANGUAGE = {
  ENGLISH: "ENGLISH",
  JAPANESE: "JAPANESE",
  CHINESE: "CHINESE",
} as const;

console.log(LANGUAGE.JAPANESE);

// 値から型変換
var isShow = true;
var count = 15;
var firstName = "tarou";
var sports = ["tennis", "soccer"];
var user = { id: 1, name: "jiro" };

type IsShow1 = typeof isShow;
type Count1 = typeof count;
type FirstName1 = typeof firstName;
type Sports = typeof sports;
type User = typeof user;

// 型アサーション(unknown)
var func = (x: unknown) => {
  var str: string = x as string;
  var num: number = x as number;
  var bool: boolean = x as boolean;
};

// 型アサーション(null)
var func6 = (x: string | null) => {
  var str: string = x as string;
};
var func7 = (x: number | undefined) => {
  var num: number = x as number;
};

// 型アサーション(!)
const func8 = (x: string | null) => {
  const str: string = x!;
};
const func9 = (x: number | undefined) => {
  const num: number = x!;
};

// 型ガード（?）
const func10 = (x: string | null) => {
  console.log(x?.length);
};
const func11 = (x: number | undefined) => {
  console.log(x?.toString());
};

// Partial
type Person4 = {
  name?: string;
  age?: number;
  email?: string;
};

// Required
type Person5 = {
  name?: string;
  age?: number;
  email?: string;
};

const person5: Required<Person5> = {
  name: "hoge",
  age: 25,
  email: "hoge",
};

// Pick
type Person6 = {
  name: string;
  age: number;
  email: string;
};

type Name = Pick<Person6, "name">;

// Omit
type Person7 = {
  name: string;
  age: number;
  email: string;
};

type NewPerson = Omit<Person, "name">;

// Readonly
type Person8 = {
  name: string;
  age: number;
  email: string;
};

type PersonReadOnly = Readonly<Person>;

// Extract
type TypeA = number | string | null;
type TypeB = number | number[] | null;
type NewType = Extract<TypeA, TypeB>;

// Exclude
type TypeA1 = number | string | null;
type NewType1 = Exclude<TypeA1, string>;

// Parameters
const func14 = (a: string, b: string) => {
  return a + b;
};
type TypeA2 = Parameters<typeof func14>;

// ReturnType
const func15 = () => {
  return {
    name: "taro",
    age: 25,
    email: "taro@example.com",
  };
};

type Person15 = ReturnType<typeof func15>;
