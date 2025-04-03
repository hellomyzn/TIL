// string
const name1: string = "hoge";
console.log(name);

//number
const age1: number = 123;
const age2: number = -1.1;

// boolean
const isAdmin: boolean = true;

//array
const fruits1: string[] = ["apple", "orange"];
const fruits2: Array<string> = ["apple", "orange"];
const fruits3: [string, number] = ["hoge", 1];
const fruits4: (string | number)[] = [1, 1, "hoge"];

// null
const value = null;
const name2: string | null = null;
const name3: string | null = "hoge";

// undefined
const value1 = undefined;
const value2: string | undefined = undefined;

//any
const name4: any = undefined;
const name5: any = 10;
const name6: any = null;
const name7: any = ["hoge", "fuga"];
const name8: any = "joho";

// 関数型
const hello1: (name: string) => string = (name: string): string => {
  return "Hello " + name;
};

const hello2: (name: string) => void = (name: string): void => {
  console.log("hello " + name);
};

// object
const user1: {
  id: number;
  name: string;
} = {
  id: 100,
  name: "John",
};

const user2: { id: number; name: string } = {
  id: 100,
  name: "John",
};

// property
const user3: { id: number; name?: string } = {
  id: 100,
};

const user4: { id: number; readonly name: string } = {
  id: 100,
  name: "hoge",
};
