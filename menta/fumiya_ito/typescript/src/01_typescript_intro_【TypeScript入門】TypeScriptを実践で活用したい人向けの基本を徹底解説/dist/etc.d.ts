declare const getValue: (format: boolean) => string | number;
declare const value5: string;
declare const digit: number;
declare let firstName: string;
declare let price: number;
declare let user20: {
    firstName: string;
    lastName: string;
};
declare const user21: {
    readonly firstName: "John";
    readonly lastName: "Doe";
};
type User21 = typeof user;
declare const fruits5: string[];
type Fruit5 = typeof fruits4;
declare const fruits6: readonly ["apple", "banana", "lemon"];
type Fruit7 = (typeof fruits6)[number];
type Person22 = {
    name: string;
    age: number;
};
type User22 = keyof Person22;
declare function getValue4<T, K extends keyof T>(obj: T, key: K): T[K];
declare const user23: Person22;
