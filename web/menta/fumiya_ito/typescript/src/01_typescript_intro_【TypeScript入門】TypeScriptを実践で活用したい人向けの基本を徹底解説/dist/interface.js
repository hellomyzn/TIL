"use strict";
const greeter1 = (person) => {
    return "Hello1 " + person.firstName + person.lastName;
};
const greeter2 = (person) => {
    return "Hello2 " + person.firstName + person.lastName;
};
const user5 = { firstName: "Jone", lastName: "Doe" };
console.log(greeter2(user5));
const user6 = {
    firstName: "John",
    lastName: "hoge",
    greeting(message) {
        return `${message} ${this.firstName}`;
    },
};
console.log(user6.greeting("Hello"));
