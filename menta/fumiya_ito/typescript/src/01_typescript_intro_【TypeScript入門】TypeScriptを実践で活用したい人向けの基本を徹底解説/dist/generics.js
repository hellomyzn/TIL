"use strict";
// for number type
function fun1(args) {
    return args;
}
// for string type
function fun2(args) {
    return args;
}
function fun3(args) {
    return args;
}
//アロー関数で記述した場合
const fun4 = (args) => args;
let result = fun4("Hello World");
let result2 = fun4(200);
let result3 = fun4("Hello World");
let result4 = fun4(200);
let result5 = fun4({ name: "John Doe" });
function funs(arg1, arg2) {
    return [arg1, arg2];
}
let result6 = funs("Hello", 100);
console.log(result4);
let result7 = fun4({ name: "John Doe" });
const kv1 = { key: 1, value: "Steve" };
const kv2 = { key: 1, value: 1000 };
const kv3 = {
    key: "10",
    value: ["John", "Steve", "Jane"],
};
const kv4 = { key: 1, value: "Steve" };
const kv5 = { key: 1, value: 1000 };
const kv6 = {
    key: "10",
    value: ["John", "Steve", "Jane"],
};
