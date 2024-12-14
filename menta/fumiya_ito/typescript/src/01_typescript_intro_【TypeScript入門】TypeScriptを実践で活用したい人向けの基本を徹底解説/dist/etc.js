"use strict";
const getValue = (format) => {
    return format ? "10" : 10;
};
const value5 = getValue(true);
const digit = value5.length;
let firstName = "John";
let price = 20;
let user20 = {
    firstName: "John",
    lastName: "Doe",
};
console.log(typeof firstName);
console.log(typeof "Jane");
console.log(typeof price);
console.log(typeof user20);
const user21 = {
    firstName: "John",
    lastName: "Doe",
};
const fruits5 = ["apple", "banana", "lemon"];
const fruits6 = ["apple", "banana", "lemon"];
function getValue4(obj, key) {
    return obj[key];
}
const user23 = { name: "John Doe", age: 24 };
