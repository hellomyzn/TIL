// ----------------------------------------------------
// forとpushをmapに変換;
// ----------------------------------------------------
// forやpushを使わずに加工した新しい配列を作ってください。
// ```
var nums = [1, 2, 3];
var array = nums.map((n) => n * 2);
// for (num of nums) {
//   array.push(num * 2);
// }
console.log(array);

// ```

// ----------------------------------------------------
// forEachとpushをmapに変換;
// ----------------------------------------------------
// forEachやpushを使わずに加工した新しい配列を作ってください。
// ```
var nums = [1, 2, 3];
var array = nums.map((n) => (n += 1));
// nums.forEach((num) => array.push(num + 1));
console.log(array);
// ```

// ----------------------------------------------------
// map;
// ----------------------------------------------------
// 冗長な処理を排除してコーディングしてください。

// ```
var users = [
  {
    name: "Bob",
    age: 33,
  },
  {
    name: "Ren",
    age: 22,
  },
];
// var names = users.map((user) => {
//   return user.name;
// });
var names = users.map(({ name }) => name);
console.log(names);
// ```

// ----------------------------------------------------
// 非破壊的splice;
// ----------------------------------------------------
// spliceを使わず、非破壊的に配列の要素を削除してください。

// ```
var array = [1, 2, 3, 4];
// var newArray = array.splice(0, 1);
// var newArray = array.shift();
var newArray = array.filter((_, i) => i === 0);

console.log(newArray);
// ```

// ----------------------------------------------------
// 非破壊的delete;
// ----------------------------------------------------
// deleteを使わず、非破壊的にオブジェクトの要素を削除してください。
// ```
var objcet = {
  name: "TaroYamada",
  age: 31,
  email: "taro@example.com",
};
// emailプロパティのみ削除してください
var { email, ...newObject } = objcet;
console.log(newObject); // { name: 'TaroYamada', age: 31 }
console.log({ email });
// ```

// ----------------------------------------------------
// let排除
// ----------------------------------------------------
// letを使わずにコーディングしてください。
// ```
var bool = true;
let val = "";
if (bool) {
  val = "trueです";
} else {
  val = "falseです";
}
// 上記の処理をletを使わずにコーディングしてください。
var newVal = bool ? "trueです" : "falseです";
console.log(newVal);
// ```

// ----------------------------------------------------
// ド・モルガンの法則2
// ----------------------------------------------------
// ド・モルガンの法則を使って条件式を簡易化してください。
var value = "";
var isString =
  value !== undefined || (value !== null && typeof value === "string");
var isString =
  !(value === undefined && value === null) && typeof value === "string";
