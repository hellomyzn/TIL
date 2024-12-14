interface Person {
  firstName: string;
  lastName: string;
}

const greeter1 = (person: Person) => {
  return "Hello1 " + person.firstName + person.lastName;
};
const greeter2 = (person: { firstName: string; lastName: string }) => {
  return "Hello2 " + person.firstName + person.lastName;
};

const user5 = { firstName: "Jone", lastName: "Doe" };
console.log(greeter2(user5));

interface Person1 {
  firstName: string;
  lastName: string;
  greeting: (message: string) => string;
}
const user6: Person1 = {
  firstName: "John",
  lastName: "hoge",
  greeting(message) {
    return `${message} ${this.firstName}`;
  },
};

console.log(user6.greeting("Hello"));
