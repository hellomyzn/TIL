// タプル型
type Tuple = [number, null, string];
const nums: Tuple = [1, null, "Hello"];

// コールバック関数の型定義
type Func = { (func: () => void, second: number): string };

// Promise型
// const func1 = (): Promise<boolean> => {
//   return new Promise((resolve) => {
//     resolve(true);
//   });
// };

// 型定義応用1
type User = {
  id: string;
  name: string;
};

type Post = {
  id: string;
  title: string;
  content: string;
};

type UserWithPosts = User & { posts: Post[] };

const userWithPosts: UserWithPosts = {
  id: "aaa",
  name: "bob",
  posts: [
    {
      id: "aaa",
      title: "hoge",
      content: "fuga",
    },
    {
      id: "bbb",
      title: "hoge2",
      content: "fuga2",
    },
  ],
};

// 型定義応用2
type Post2 = {
  id: string;
  title: string;
  index: number;
};

type Comments = {
  id: string;
  title: string;
  content: string;
  wordCount: number;
};

type PostWithComments = Post2 & { comments: Comments[] };

const postWithComments: PostWithComments = {
  id: "aaa",
  title: "testPost",
  index: 1,
  comments: [
    {
      id: "aaa",
      title: "hoge",
      content: "fuga",
      wordCount: 4,
    },
    {
      id: "bbb",
      title: "hoge2",
      content: "fuga2",
      wordCount: 4,
    },
  ],
};

// 型定義応用3
type TodoInput = {
  id: string;
  name: string;
  dueDate?: string;
  isDone: Readonly<boolean>;
};

// 型定義応用4
// 型定義応用5

// オブジェクトのkeyをユニオン型に変換
const user3 = { id: 3, name: "bob" };
type UserKey = keyof typeof user3;

// オブジェクトのvalueをユニオン型に変換
const user4 = { id: 3, name: "bob" } as const;
type UserValue = (typeof user4)[UserKey];

// 配列からユニオン型変換
const fruits = ["apple", "orange", "lemon"];
type FruitsType = (typeof fruits)[number];
// FruitsType = "apple" | "orange" | "lemon" となるように変換してください

// never型の活用1
type CurriculumLanguage = "JavaScript" | "TypeScript" | "React" | "Go";

const printLearningLanguage = (lang: CurriculumLanguage) => {
  switch (lang) {
    case "JavaScript":
      console.log(`I'm learning ${lang}`);
      break;
    case "TypeScript":
      console.log(`I'm learning ${lang}`);
      break;
    case "React":
      console.log(`I'm learning ${lang}`);
      break;
    case "Go":
      console.log(`I'm learning ${lang}`);
      break;
    default:
      const neverValue: never = lang;
      throw new Error(`${lang}はカリキュラムにない言語です`);
  }
};

// never型の活用2
class ExhaustiveError extends Error {
  constructor(value: never, message = `${value}はカリキュラムにない言語です`) {
    super(message);
  }
}

const printLearningLanguage1 = (lang: CurriculumLanguage) => {
  switch (lang) {
    case "JavaScript":
      console.log(`I'm learnig ${lang}`);
      break;
    case "TypeScript":
      console.log(`I'm learnig ${lang}`);
      break;
    case "React":
      console.log(`I'm learnig ${lang}`);
      break;
    case "Go":
      console.log(`I'm learnig ${lang}`);
      break;
    default:
      throw new ExhaustiveError(lang);
  }
};

printLearningLanguage1("Go");

// 型ガード（typeof）
const func1 = (x: string | number) => {
  if (typeof x === "string") {
    console.log(x.length);
  }
  if (typeof x === "number") {
    console.log(x.toString());
  }
};
const func2 = (x: number | number[]) => {
  if (typeof x === "number") {
    console.log(x.toString());
  }
  if (typeof x === "object") {
    console.log(x.map((x) => x * 2));
  }
};

// 型ガード（in）
type Person = {
  name: string;
  age: number;
  email?: string;
};

const getEmail = (person: Person): string | undefined => {
  if ("email" in person) {
    return person.email;
  } else {
    return undefined;
  }
};

// 型ガード（ユニオンオブジェクト）
type Success = { isSuccess: true; message: string };
type Failure = { isSuccess: false; error: string };

const res = (res: Success | Failure) => {
  if ("isSuccess" in res) {
    if (res.isSuccess === true) {
      console.log(res.message);
    } else {
      console.log(res.error);
    }
  }
};

// 型ガードエラーハンドリング(typeof)
// const func = async () => {
//   try {
//     await fetch("http://a.com");
//   } catch (error) {
//     if (typeof error === "object") {
//       console.log(error);
//     }
//   }
// };

// 型ガードエラーハンドリング(instanceof)
// const func = async () => {
//   try {
//     await fetch("http://a.com");
//   } catch (error) {
//     if (error instanceof Error) {
//       console.log(error.message);
//     }
//   }
// };

// 型ガードエラーハンドリング(instanceof / extends)
// class HttpError extends Error {
//   //ここにclassを作ってください
//   status?: number;
// }

// const func = async () => {
//   try {
//     await fetch("http://a.com");
//   } catch (error) {
//     if (error instanceof HttpError) {
//       if (error.status === 404) {
//         console.log(error.status);
//       }
//     }
//   }
// };

// 型ガードHTTPエラーハンドリング(in)
// class HttpError extends Error {
//   //ここにclassを作ってください
//   status?: number;
// }

// const func = async () => {
//   try {
//     await fetch("http://a.com");
//   } catch (error) {
//     if (error instanceof HttpError) {
//       if ("status" in error) {
//         console.log(error.status);
//       }
//     }
//   }
// };

// 型ガード(is)
const getString = (x: unknown): x is string => {
  return typeof x === "string";
};

const func = (x: unknown): string => {
  if (getString(x)) {
    return x;
  } else {
    return "";
  }
};

// 複数Pick
type Person1 = {
  name: string;
  age: number;
  email: string;
};

type NewPersonProps = Pick<Person1, "name" | "age">;

// 複数Omit
type Person2 = {
  name: string;
  age: number;
  email: string;
};

type NewPersonProps2 = Omit<Person2, "name" | "email">;

// Utility型応用1
type Person3 = {
  name: string;
  age: number;
  email: string;
};
type NewPerson = Readonly<Pick<Person3, "name" | "age">>;

// Utility型応用2
type Person4 = {
  name: string;
  age: number;
  email: string;
};

type NewPerson4 = Partial<Pick<Person4, "name" | "age">>;

// Utility型応用3
type Person5 = {
  name: string;
  age: number;
  email: string;
};
type NewPerson5 = Partial<Omit<Person4, "email">>;

// Utility型応用4
type Person6 = Record<
  "firstName" | "lastName" | "age" | "email" | "address",
  string
>;
type PersonName = Pick<Person6, "firstName" | "lastName">;
type PersonInfo = Pick<Person6, "age" | "email" | "address">;

// Index型（Index signature）
let stringNumberObject: {
  [age: string]: number;
};

stringNumberObject = { age: 36 }; //ok
stringNumberObject.age = 36; //ok
stringNumberObject["age"] = 36; //ok
// stringNumberObject["age"] = "36" //error

// Record
let stringNumberObject1: Record<string, number>;

stringNumberObject1 = { age: 36 }; //ok
stringNumberObject1.age = 36; //ok
stringNumberObject1["age"] = 36; //ok
// stringNumberObject1["age"] = "36"; //error

// MappedType
type Keys = "javascript" | "python";
type Obj = {
  [key in Keys]: string;
};

// ジェネリクスオブジェクトの型生成
type Data<T> = {
  id: number;
  payload: T;
};

const data1: Data<number> = {
  id: 1,
  payload: 2,
};

const data2: Data<string> = {
  id: 1,
  payload: "hoge",
};

const data3: Data<{ name: string }> = {
  id: 1,
  payload: {
    name: "bob",
  },
};

// ジェネリクスオブジェクトの型定義
type Data1<T> = {
  id: number;
  message: T;
};

const data4: Data1<string> = {
  id: 1,
  message: "hoge",
};

const data5: Data1<string[]> = {
  id: 2,
  message: ["foo", "bar"],
};

// ジェネリクス関数
function func5<T>(x: T): T {
  return x;
}

const str = func5<string>("a");
const num = func5<number>(1);

// ジェネリクスで型変数を絞る
type Person7 = {
  name: string;
  age: number;
};

const getAge = <T extends Person7>(person: T): number => {
  return person.age;
};
