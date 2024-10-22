// import divideFun, { times } from "./calc2.mjs";
import divideFun, * as calc from "./calc2.mjs";

const result1 = calc.times(1, 2);
console.log(result1);

const result2 = divideFun(1, 2);
console.log(result2);

const result3 = calc.default(1, 2);
console.log(result3);
