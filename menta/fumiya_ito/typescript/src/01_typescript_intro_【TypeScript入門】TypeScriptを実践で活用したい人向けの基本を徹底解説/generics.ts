// for number type
function fun1(args: number): number {
  return args;
}

// for string type
function fun2(args: string): string {
  return args;
}

function fun3<T>(args: T): T {
  return args;
}

//アロー関数で記述した場合
const fun4 = <T>(args: T): T => args;

let result = fun4<string>("Hello World");
let result2 = fun4<number>(200);

let result3 = fun4("Hello World");
let result4 = fun4(200);

let result5 = fun4<{ name: string }>({ name: "John Doe" });

function funs<T, U>(arg1: T, arg2: U): [T, U] {
  return [arg1, arg2];
}
let result6 = funs<string, number>("Hello", 100);
console.log(result4);
//結果
// ["Hello", 100];

//Interface
interface User18 {
  name: string;
}

//型エイリアス
type User19 = {
  name: string;
};
let result7 = fun4<User18>({ name: "John Doe" });

interface KeyPair<T, U> {
  key: T;
  value: U;
}

const kv1: KeyPair<number, string> = { key: 1, value: "Steve" };
const kv2: KeyPair<number, number> = { key: 1, value: 1000 };
const kv3: KeyPair<string, string[]> = {
  key: "10",
  value: ["John", "Steve", "Jane"],
};

type KeyPair1<T, U> = {
  key: T;
  value: U;
};

const kv4: KeyPair1<number, string> = { key: 1, value: "Steve" };
const kv5: KeyPair1<number, number> = { key: 1, value: 1000 };

const kv6: KeyPair1<string, string[]> = {
  key: "10",
  value: ["John", "Steve", "Jane"],
};
