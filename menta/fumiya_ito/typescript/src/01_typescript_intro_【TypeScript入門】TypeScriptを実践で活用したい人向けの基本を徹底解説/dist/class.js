"use strict";
class Person2 {
    constructor(firstName, lastName) {
        this.firstName = firstName;
        this.lastName = lastName;
    }
    fullName() {
        return `${this.firstName} ${this.lastName}`;
    }
}
const user7 = new Person2("John", "hoge");
console.log(user7.fullName());
user7.firstName = "fuga";
console.log(user7.fullName());
class Person3 {
    constructor(firstName, lastName) {
        this.firstName = firstName;
        this.lastName = lastName;
    }
    fullName() {
        return `${this.firstName} ${this.lastName}`;
    }
}
const user8 = new Person3("John", "hoge");
// error
// user7.firstName = "fuga";
console.log(user8.fullName());
class Person4 {
    constructor(firstName, lastName) {
        this.firstName = firstName;
        this.lastName = lastName;
    }
    fullName() {
        return `${this.firstName} ${this.lastName}`;
    }
}
class User1 extends Person4 {
    constructor(firstName, lastName, isAdmin) {
        super(firstName, lastName);
        this.isAdmin = isAdmin;
    }
    fullName() {
        return super.fullName();
    }
    yourFirstName() {
        console.log(this.firstName);
    }
}
const user9 = new User1("John", "Tom", true);
// not allowed since is's protected variable
// user9.firstName = "hoge";
user9.yourFirstName();
class Person5 {
    constructor(firstName, lastName) {
        this.firstName = firstName;
        this.lastName = lastName;
    }
    fullName() {
        return `${this.firstName} ${this.lastName}`;
    }
}
const user10 = new Person5("Eiji", "Miyazono");
// user10.setName("hoge");
console.log(user10.fullName());
class Person6 {
    constructor(firstName, lastName) {
        this.firstName = firstName;
        this.lastName = lastName;
    }
    fullName() {
        return `${this.firstName} ${this.lastName}`;
    }
}
const user11 = new Person6("eiji", "m");
console.log(user11.fullName());
