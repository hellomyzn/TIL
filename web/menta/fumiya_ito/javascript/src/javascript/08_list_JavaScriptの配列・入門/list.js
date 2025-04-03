// 配列
// 値に順序をつけて格納できるオブジェクトです。
// また、配列に格納した値のことを要素、それぞれの要素の位置をインデックス(index)と言います
// ※ インデックス（index）は、0番目から始まります

// 例1 3つの文字列 'みかん'と'りんご'と'バナナ'を持つ配列
var hoge = ["みかん", "りんご", "バナナ"]; //indexが2番目の要素は'バナナ'

// 例2 3つの数値 1と2と3を持つ配列
var fuga = [1, 2, 3]; // indexが1番目の要素は1

// 配列宣言（配列リテラル:[]）
// 配列は、以下のように配列リテラルを使って宣言が可能です。
// 要素を持たない配列を宣言
[];

// 例1 空の配列を変数arrayに定義し、コンソールに出力
var array = [];
console.log(array); // []

// 例2 3つの文字列("父", "母", "子")を要素にもつ配列を変数familyに定義し、コンソールに出力
var family = ["父", "母", "子"];
console.log(family); // ["父", "母", "子"]

// 配列宣言（配列コンストラクタ:new Array()）
// 配列は、以下のように配列コンストラクタArray()を使って宣言が可能です。
new Array(); // []

// 例1 空の配列を変数arrayに定義し、コンソールに出力
var array = new Array();
console.log(array); // []

// 例2 3つの文字列("父", "母", "子")を要素にもつ配列を変数familyに定義し、コンソールに出力
var family = new Array("父", "母", "子");
console.log(family); // ["父", "母", "子"]

// 配列の要素の取得
// 配列は、以下のように添字を使って要素を取得可能です。
var array = ["hoge"];
array[0]; // 'hoge'

// 例1 配列vegetablesから'potato'を取得し、コンソールに出力
var vegetables = ["tomato", "potato", "carrot"];
console.log(vegetables[1]); // 'potato'

// 例2 配列numsから10を取得し、コンソールに出力
var nums = [1, 10, 100];
console.log(nums[1]); // 10

// 配列内のオブジェクトの要素へのアクセス
// 配列は、以下のように添字を使ってオブジェクトやその要素を取得可能です。

var array = [{ text: "hoge" }];
array[0]; // { text: 'hoge' }
array[0].text; // 'hoge'

// 例1 配列sampleUsersから{ name: '田中', class: '1年1組' }を取得し、コンソールに出力
var sampleUsers = [
  { name: "田中", class: "1年1組" },
  { name: "鈴木", class: "1年2組" },
  { name: "加藤", class: "1年2組" },
  { name: "佐藤", class: "1年1組" },
];
console.log(sampleUsers[0]); // { name: '田中', class: '1年1組' }

// 例2 配列sampleUsersから鈴木を取得し、コンソールに出力
var sampleUsers = [
  { name: "田中", class: "1年1組" },
  { name: "鈴木", class: "1年2組" },
  { name: "加藤", class: "1年2組" },
  { name: "佐藤", class: "1年1組" },
];
console.log(sampleUsers[1].name); // '鈴木'

// 配列内の配列の要素へのアクセス
// 以下のように添字を使って配列内の配列やその要素を取得可能です。
var array = [["hoge", "hoge2"], ["hoge3"]];
array[0]; // ['hoge', 'hoge2']
array[0][1]; // 'hoge2'

// 例1 配列fruitsから['apple', 'strawberry']を取得し、コンソールに出力
var fruits = [
  ["pineapple", "banana", "grape"],
  ["melon", "peach"],
  ["apple", "strawberry"],
];
console.log(fruits[2]); // ['apple', 'strawberry']

// 例2 配列fruitsからappleを取得し、コンソールに出力
var fruits = [
  ["pineapple", "banana", "grape"],
  ["melon", "peach"],
  ["apple", "strawberry"],
];
console.log(fruits[2][0]); // 'apple'

// 配列の要素の更新(プリミティブ)
// 以下のように添字を使って配列内の要素を更新可能です。
var array = ["hoge", "hoge2", "hoge3"];
array[0] = "hoge4";
console.log(array[0]); // 'hoge4'

// 例1 配列vegetablesの添字1の要素を'cucumber'に更新して、コンソールに出力
var vegetables = ["tomato", "potato", "carrot"];
vegetables[1] = "cucumber";
console.log(vegetables);
// ['tomato', 'cucumber', 'carrot']

// 例2 配列scoresの添字1の要素を4に更新して、コンソールに出力
var scores = [1, 3, 5];
scores[1] = 4;
console.log(scores);
// [1, 4, 5]

//  for-of文
// 以下のように、文字列の値等をループ処理できます。
// for (変数 of 値) {
//   処理
// }

// 例1 文字列wordをループ処理し、各文字をコンソールに出力する
var word = "Hello";
for (let x of word) {
  console.log(x);
}
// 'H'
// 'e'
// 'l'
// 'l'
// 'o'

// 例1 配列vegetablesをループ処理し、各要素をコンソールに出力する
var vegetables = ["tomato", "potato", "carrot"];
for (let vegetable of vegetables) {
  console.log(vegetable);
}

// 問題1. 配列内の要素をすべて足し合わせてください
var arr = [1, 2, 3, 4, 5];
// この下に解答してください

var calcTotal = (array) => {
  let sum = 0;
  for (let a of arr) {
    sum += a;
  }
  return sum;
};
console.log(calcTotal(arr));
