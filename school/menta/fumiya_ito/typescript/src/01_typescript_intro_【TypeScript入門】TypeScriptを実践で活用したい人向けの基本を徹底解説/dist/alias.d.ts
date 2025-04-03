type Name = string;
declare function hello(name: Name): string;
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
declare const user14: Person14;
type PersonFirst = {
    firstName: string;
};
type PersonLast = {
    lastName: string;
};
type Person15 = PersonFirst & PersonLast;
declare const user15: Person15;
interface PersonFirst1 {
    firstName: string;
}
interface PersonLast1 {
    lastName: string;
}
interface Person16 extends PersonFirst1, PersonLast1 {
}
declare const user16: Person16;
type fruits = "apple" | "banana" | "lemmon";
declare const fruit: fruits;
type helloFunc = (name: string) => void;
declare const hello3: helloFunc;
interface helloFunc1 {
    (name: string): void;
}
declare const hello4: helloFunc1;
