declare let value4: string | number;
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
declare const user17: Person17;
type Person18 = PersonFirst17 & PersonLast17;
declare const user18: Person18;
