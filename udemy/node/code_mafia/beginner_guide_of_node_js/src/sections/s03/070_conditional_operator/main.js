// 三項演算子（ ? : ）

const a = true;
let resultA = a ? "true" : "false";
console.log(resultA);

// if (a) {
//   resultA = "true";
// } else {
//   resultA = "false";
// }
// console.log(resultA);

// function getResult() {
//   return a ? "true" : "false";
// }
// console.log(getResult());

const getResult2 = (str) => (typeof str === "string" ? "t" : "f");
console.log(getResult2("hoge"));
console.log(getResult2(1));
