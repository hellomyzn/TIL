type Name = string;
function hello(name: Name) {
  return "hello " + name;
}

type Person11 = {
  firstName: string;
  lastName: string;
};

interface Person14 {
  firstName: string;
  age: number;
}
interface Person14 {
  lastName: string;
  age: number;
}

const user14: Person14 = {
  firstName: "John",
  lastName: "Doe",
  age: 10,
};

type PersonFirst = {
  firstName: string;
};

type PersonLast = {
  lastName: string;
};

type Person15 = PersonFirst & PersonLast;
const user15: Person15 = {
  firstName: "john",
  lastName: "Doe",
};

interface PersonFirst1 {
  firstName: string;
}

interface PersonLast1 {
  lastName: string;
}
interface Person16 extends PersonFirst1, PersonLast1 {}
const user16: Person16 = {
  firstName: "john",
  lastName: "Doe",
};

type fruits = "apple" | "banana" | "lemmon";
const fruit: fruits = "apple";

type helloFunc = (name: string) => void;
const hello3: helloFunc = (name: string): void => {
  console.log("hello " + name);
};

interface helloFunc1 {
  (name: string): void;
}

const hello4: helloFunc1 = (name: string): void => {
  console.log("Hello " + name);
};
