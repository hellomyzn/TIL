declare class Person2 {
    firstName: string;
    lastName: string;
    constructor(firstName: string, lastName: string);
    fullName(): string;
}
declare const user7: Person2;
declare class Person3 {
    private firstName;
    lastName: string;
    constructor(firstName: string, lastName: string);
    fullName(): string;
}
declare const user8: Person3;
declare class Person4 {
    protected firstName: string;
    lastName: string;
    constructor(firstName: string, lastName: string);
    fullName(): string;
}
declare class User1 extends Person4 {
    isAdmin: boolean;
    constructor(firstName: string, lastName: string, isAdmin: boolean);
    fullName(): string;
    yourFirstName(): void;
}
declare const user9: User1;
declare class Person5 {
    readonly firstName: string;
    lastName: string;
    constructor(firstName: string, lastName: string);
    fullName(): string;
}
declare const user10: Person5;
declare class Person6 {
    firstName: string;
    lastName: string;
    constructor(firstName: string, lastName: string);
    fullName(): string;
}
declare const user11: Person6;
interface Person {
    firstName: string;
    lastName: string;
}
declare class Student implements Person {
    firstName: string;
    lastName: string;
    constructor(firstName: string, lastName: string);
}
interface FullName {
    readonly firstName: string;
    readonly lastName: string;
}
interface MiddleName {
    readonly middleName: string;
}
declare class American1 implements FullName, MiddleName {
    readonly firstName: string;
    readonly lastName: string;
    readonly middleName: string;
    constructor(firstName: string, lastName: string, middleName: string);
}
interface Person2 {
    firstName: string;
    middleName?: string;
    lastName: string;
}
declare class Student3 implements Person {
    firstName: string;
    lastName: string;
    constructor(firstName: string, lastName: string);
}
declare const user12: Student;
