// オブジェクトにメソッドを追加
// オブジェクトとは、複数の値や処理をまとめたものです。オブジェクトのプロパティは、プロパティ名: 値 の形式で作られています。プロパティ名（キーとも呼ばれます。）を使うことで、プロパティから、そのプロパティの値を取り出すことができます。また、メソッドは、プロパティの値に関数を代入することで、作ることができます。

var object = {
  name: "suzuki",
  hello: function () {
    console.log("こんにちは");
  },
};

// 例1:オブジェクトの外側から呼び出す
var object = {
  name: "suzuki",
  hello: function () {
    console.log("こんにちは");
  },
};

object.hello(); //"こんにちは"
// オブジェクト名.メソッド名()で呼び出すことができます。

// 例2:メソッドからプロパティを利用する
var object = {
  name: "suzuki",
  hello: function () {
    console.log("こんにちは" + this.name + "さん");
  },
};
object.hello(); //"こんにちはsuzukiさん"

var object = {
  name: "suzuki",
  hello: () => {
    console.log("こんにちは" + this.name + "さん. This is arrow func");
  },
};

object.hello(); //"こんにちはsuzukiさん"
// thisは、そのメソッドが属するオブジェクト自身を指します。this.nameは、オブジェクトのnameプロパティの値を参照します。

// for-in文
// for-in文では、オブジェクトのプロパティ名を順番に取り出して、ループ処理を行います。for (let key in object)という形式で書きます。keyには、オブジェクトのプロパティ名が順番に代入されます。

// for (let key in object) {
//     処理
// }

// 例1 オブジェクトsteveをループ処理し、各プロパティ名をコンソールに出力

var steve = { age: 56, height: "6ft" };
for (let key in steve) {
  console.log(key);
}
// age, heightがコンソールに出力される
// 例2 オブジェクトからプロパティ名に対応する値を出力
for (let key in steve) {
  console.log(steve[key]);
}
// プロパティ名に対応する値がコンソールに出力される

// Object.entries()
// オブジェクトのキーとバリューを配列で取得
// 戻り値は配列なので、配列で使えるメソッドを使用することができる

let user = {
  name: "tanaka",
  age: 25,
};

// オブジェクトのキーとバリューを取得
console.log(Object.entries(user)); // [ [ 'name', 'tanaka' ], [ 'age', 25 ] ]

// hasOwnProperty
// オブジェクトのプロパティチェック。
// 真偽値を返す。

// オブジェクト.hasOwnProperty(調べたいプロパティ名）
// 例1: hasOwnPropertyを使用して、objがnameプロパティもっているかどうかを出力します
var obj = { id: 0 };
console.log(obj.hasOwnProperty("name")); // false

// 例2: hasOwnPropertyを使用して、objがidプロパティもっているかどうかを出力します
var obj = { id: 0 };
console.log(obj.hasOwnProperty("id")); // true

// in演算子
// オブジェクトのプロパティチェック。
// 真偽値を返す。

// 調べたいプロパティ名 in オブジェクト
// 例1: inを使用して、objがnameプロパティもっているかどうかを出力します
var obj = { id: 0 };
console.log("name" in obj); // false

// 例2: inを使用して、objがidプロパティもっているかどうかを出力します
var obj = { id: 0 };
console.log("id" in obj); // true
