const getValue = (format: boolean): string | number => {
  return format ? "10" : 10;
};

const value5 = getValue(true) as string;
const digit = value5.length;

let firstName = "John";
let price = 20;
let user20 = {
  firstName: "John",
  lastName: "Doe",
};

console.log(typeof firstName);
console.log(typeof "Jane");
console.log(typeof price);
console.log(typeof user20);

const user21 = {
  firstName: "John",
  lastName: "Doe",
} as const;

type User21 = typeof user;

const fruits5 = ["apple", "banana", "lemon"];
type Fruit5 = typeof fruits4;

const fruits6 = ["apple", "banana", "lemon"] as const;
type Fruit7 = (typeof fruits6)[number];

type Person22 = {
  name: string;
  age: number;
};

type User22 = keyof Person22;

function getValue4<T, K extends keyof T>(obj: T, key: K) {
  return obj[key];
}

const user23: Person22 = { name: "John Doe", age: 24 };
