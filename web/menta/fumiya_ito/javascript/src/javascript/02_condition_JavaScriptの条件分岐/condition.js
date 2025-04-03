// if文
// if文では、条件式を指定することで、その条件が真であるかどうか判定し、真である場合は指定した処理を実行します。
// if (条件式) {
//   処理
// }

// 例1 変数numberが5以上の時に'numberは5以上です'と出力する
var number = 20
if (number >= 5) {
  console.log('numberは5以上です')
}


// truthy、falsyの値
// 条件を満たすような値（trueとみなされる値）をtruthyな値、条件を満たさない値（falseとみなされる値）をfalsyな値と呼びます。
// 以下の表にあるfalsyな値以外はtruthyな値となります。

// falsyな値	説明
// false        真偽値
// 0	        数値の0
// -0       	数値の0のマイナス
// 0n	        長整数型の0
// ' '      	空の文字列
// null	        何も値が存在しないことを表す値
// undefined	宣言はされているが値が代入されていないことを表す値
// NaN	        数値ではないものを表す値


// if文とtruthy、falsyな値
// if文では、条件式を指定することで、その条件が真であるかどうか判定し、真である場合は指定した処理を実行します。そのため、偽である場合は指定した処理は実行されません。

// 例1 truthyな値を使用した場合、if文の条件式は真として評価されます
if (1) {
  console.log('1はtruthyな値です')
}
// 例2 falsyな値を使用した場合、if文の条件式は偽として評価されます
if (0) {
  console.log('0はfalsyな値なので、実行されません')
}
// 例3 変数に値が入っている場合、if文の条件式は真として評価されます
const animal = 'dog'
if (animal) {
  console.log('変数animalはtrueと評価されるので、実行されます')
}
// 例4 変数にfalsyな値が入っている場合、if文の条件式は偽として評価されます
const data = null
// 変数dataはnullであるためfalseとみなされ実行されない
if (data) {
console.log('データが存在しています')
}


// else節
// if文では、条件式の条件を満たさない場合に実行したい処理をelse節に記述します。
// if (条件式) {
//   条件がtrueの時の処理
// } else {
//   条件がfalseの時の処理
// }

// 例1 else節を使った条件文
var number = 5

// '10以下の数値です' と出力
if (number > 10) {
  console.log('10より大きい数値です')
} else {
  console.log('10以下の数値です')
}


// else if
// else ifは、if文の条件式が偽である場合で特定の条件が満たされたときに、特定の処理を実行するために使用されます。
// if (条件式1) {
//   条件式1がtrueであれば実行
// } else if (条件式2) {
//   条件式1がfalseのとき、条件式2がtrueであれば実行
// } else {
//   条件式1と2がともにfalseであれば実行
// }

// 例1 else ifを使って変数scoreが80以上の場合、70以上80未満の場合、それ以外の条件の場合にコンソールに出力する内容を変更
var score = 90
if (score >= 80) {
  console.log('合格です！おめでとうございます！')
} else if (score >= 70) {
  console.log('不合格です！おしい！')
} else {
  console.log('不合格です！がんばりましょう！')
}

