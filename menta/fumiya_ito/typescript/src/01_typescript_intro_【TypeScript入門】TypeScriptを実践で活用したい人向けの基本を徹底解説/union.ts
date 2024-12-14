let value4: string | number = 100;
value4 = "hoge";

type PersonFirst17 = {
  firstName: string;
  age: number;
  height: number;
};

type PersonLast17 = {
  lastName: string;
  age: number;
  weight: number;
};

type Person17 = PersonFirst17 | PersonLast17;

const user17: Person17 = {
  firstName: "John",
  lastName: "Doe",
  age: 10,
  weight: 60,
};

type Person18 = PersonFirst17 & PersonLast17;
const user18: Person18 = {
  firstName: "John",
  lastName: "Doe",
  age: 10,
  height: 160,
  weight: 60,
};
