// while文
// 条件式がtrueに評価される間、実行するループ(繰り返し処理)を作成します。

// while (条件式){
//   // 繰り返し処理
// }

// 例1 変数indexが3未満の場合にコンソールに出力するwhile文のループ処理
let index = 0;
while (index < 3) {
  console.log(index);
  index++;
}
/* 実行結果
    0
    1
    2
*/

// do while文
// 条件式が false に評価されるまで、実行するループを作成します。
// 条件式はブロック文を実行した後に評価されます。結果として、指定されたブロック文は少なくとも 1 回は実行されます。

// do {
//   // 繰り返し処理
// } while (条件式)

// 例1 変数iが5未満の場合、ループするdo while文処理
var result = "";
var i = 0;

do {
  i++;
  result = result + i;
} while (i < 5);

console.log(result);
// 12345

// 例2 do while文は最初の 1 回は実行されるので、同じ条件式でもwhile文と結果が異なる
// do while文
var result = "";
var i = 1;

do {
  i++;
  result = result + i;
} while (i < 1);

console.log(result);
// 2

// while文
var result = "";
var i = 1;
while (i < 1) {
  i++;
  result = result + i;
}

console.log(result);
// (何も出力されない)
