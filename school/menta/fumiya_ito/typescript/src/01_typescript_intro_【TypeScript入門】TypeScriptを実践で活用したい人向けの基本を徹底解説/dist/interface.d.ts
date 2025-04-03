interface Person {
    firstName: string;
    lastName: string;
}
declare const greeter1: (person: Person) => string;
declare const greeter2: (person: {
    firstName: string;
    lastName: string;
}) => string;
declare const user5: {
    firstName: string;
    lastName: string;
};
interface Person1 {
    firstName: string;
    lastName: string;
    greeting: (message: string) => string;
}
declare const user6: Person1;
