// JSON
// JSONのデータ形式は、プロパティと値をそれぞれ" "で囲む必要があります。

// 例1: JSONデータを作成
var json = {
  name: "鈴木",
  age: "24",
  hobby: "baseball",
};

// JSON.parse()
// JSON.parse()は、JSON 形式の文字列をJavaScript オブジェクトに変換するための関数です。

// 例1: JSON 形式の文字列を JavaScript オブジェクトに変換
var jsonString = {
  name: "John Doe",
  age: 30,
  email: "johndoe@example.com",
};
var jsonString2 = JSON.stringify(jsonString);
var user = JSON.parse(jsonString2);
console.log(user); // { name: "John Doe",  age: 30, email: "johndoe@example.com" }

// JSON.stringify()
// JSON.stringify() は、JavaScript オブジェクトをJSON 形式の文字列に変換するための関数です。

// 例1: JavaScript オブジェクトをJSON 形式の文字列に変換
var user = { name: "John Doe", age: 30, email: "johndoe@example.com" };

var jsonString = JSON.stringify(user);
console.log(jsonString); // { "name": "John Doe","age": 30, "email": "johndoe@example.com" }

// Dateオブジェクト
// Dateオブジェクトは、年、月、日、時、分、秒などの情報を取得したり、設定したりすることができます。
// Dateオブジェクトを作成するには、new Date()を使います。

// new Date()の使い方
// 引数は以下のように指定することができます。
// var dateObject = new Date(
//   year,
//   monthIndex,
//   day,
//   hours,
//   minutes,
//   seconds,
//   milliseconds
// );

// - year
// 必須の値で、基本的に西暦で指定する
// 0〜99の場合は1900が足された年となる

// - monthIndex
// 必須の値で、0（1月）〜11（12月）で指定する

// - day
// 指定がなければデフォルトで1となる

// - hours
// 0〜23で指定する
// 指定がなければデフォルトで0となる

// - minutes/seconds/milliseconds
// 指定がなければデフォルトで0となる
// また、引数の指定がない場合は、現在の日付と時刻でDateオブジェクトが生成されます。

// ※日付や時刻は、あなたのコンピューターやスマートフォンが設定されている場所（タイムゾーン）によって変わります。

// 例1: 引数を指定して、特定の日時を表すオブジェクトを作成
// 2023年3月9日14時30分00秒を指定する
var dateObject = new Date(2023, 2, 9, 14, 30, 0);
console.log(dateObject); // Thu Mar 09 2023 14:30:00 GMT+0900 (日本標準時)

// 例2: 現在の日付と時刻を取得;
// 現在日時が2023年3月9日19時24分54秒であった場合
var date = new Date();
console.log(date); // Thu Mar 09 2023 19:24:54 GMT+0900 (日本標準時)

// Dateオブジェクトとインスタンスメソッド①
// Dateオブジェクトには、インスタンスメソッドと呼ばれる、オブジェクト自身で使用するメソッドがいくつか用意されています。インスタンスメソッドを使うことで、日付と時刻を取得することができるようになります。
// 以下がメソッドの一覧です。

// getFullYear()	　// 年を取得（4桁）
// getMonth()	// 月を取得（0から11）
// getDate()	// 月の日を取得（1から31）
// getDay()	// 週の曜日を取得（0から6）
// getHours()	// 時を取得（0から23）)
// getMinutes()	// 分を取得（0から59）
// getSeconds()	// 秒を取得（0から59）
// getMilliseconds()	// ミリ秒を取得(0から999)

// 例1: 日付の取得
var now = new Date(); // 現在の日付を取得
var year = now.getFullYear(); // 年を取得（4桁）
var month = now.getMonth() + 1; // 月を取得（0から11） ※1を加算して1月を0から始める数字に変換
var date = now.getDate(); // 日を取得（1から31）
console.log(`${year}/${month}/${date}`); // 2023/3/19
// 上記のコードでは、まず現在の日時を表すDateオブジェクトを生成しています。その後、それぞれgetFullYear()メソッド、getMonth()メソッド、getDate()メソッドを使って、年・月・日の情報を取得しています。

// 例2: 指定した日付の取得
var date = new Date("2023-03-19"); // 指定した日付を取得
var year = date.getFullYear(); // 年を取得（4桁）
var month = date.getMonth() + 1; // 月を取得（0から11） ※1を加算して1月を0から始める数字に変換
var day = date.getDate(); // 日を取得（1から31）
var dayOfWeek = date.getDay(); // 曜日を取得（0から6）
console.log(
  `${year}/${month}/${day} (${
    ["日", "月", "火", "水", "木", "金", "土"][dayOfWeek]
  })`
); // 2023/3/19 (日)
// 上記のコードでは、指定されている日付の情報を取得するためのインスタンスメソッド getFullYear()、getMonth()、getDate()、getDay() を使用して、年、月、日、曜日の情報を取得しています。
// また、曜日に関しては、getDay()メソッドで取得される数字を日本語の曜日に変換するため、配列を使用しています。['日', '月', '火', '水', '木', '金', '土']は、日曜日から土曜日までの曜日を表す配列です。

// Dateオブジェクトとインスタンスメソッド②
// Dateオブジェクトには、時刻を操作するためのインスタンスメソッドが用意されています。

// 例1: 現在の時刻を取得
var now = new Date(); // 現在の日付を取得
var hours = now.getHours(); // 時を取得（0から23）
var minutes = now.getMinutes(); // 分を取得（0から59）
var seconds = now.getSeconds(); // 秒を取得（0から59）
console.log(`${hours}:${minutes}:${seconds}`); // 例：12:34:56
// それぞれの時刻の情報を取得するためのインスタンスメソッドgetHours()、getMinutes()、getSeconds()を使用して、時、分、秒の情報を取得しています。

// 例2: 指定した時刻の取得
var date = new Date("2023-03-19T12:34:56"); // 指定した日付を取得
var hours = date.getHours(); // 時を取得（0から23）
var minutes = date.getMinutes(); // 分を取得（0から59）
var seconds = date.getSeconds(); // 秒を取得（0から59）
console.log(`${hours}:${minutes}:${seconds}`); // 例：12:34:56
// 指定されている時刻の情報を取得するためのインスタンスメソッドgetHours()、getMinutes()、getSeconds()を使用して、時、分、秒の情報を取得しています。

// Mathオブジェクト
// MathオブジェクトはJSに用意されている数学的な処理をするためのもの。

// Math.abs(a):  引数で渡した数値の絶対値を返す。
// Math.round(a): 引数で渡した数値を四捨五入する。
// Math.ceil(a): 引数で渡した数値の小数点を切り上げる。
// Math.floor(a): 引数で渡した数値の小数点を切り捨てる。
// max(a, b, c): 引数で渡した数値の最大の数値を返す。
// min(a, b, c): 引数で渡した数値の最小の数値を返す。
// random(): 0以上1未満の乱数を生成する。

Math.abs(-2); // 2
Math.round(1.666); // 2
Math.ceil(1.666); // 2
Math.floor(1.666); // 1
Math.max(1, 2, 3, 4); // 4
Math.min(1, 2, 3, 4); // 1
Math.random(); // 0~1のランダムな数

// Math.max()
// Math.max()を使用して最大値を取得することができます。

// 例1: number配列の中の最大値を取得
var number = [3, 1, 13, 32, 27];
var maxNumber = Math.max(...number);

console.log(maxNumber); // 32
// スプレッド演算子を使用して、number配列の要素を可変長引数としてMath.maxメソッドに渡しています。

// Math.min()
// 最小値を取得するには、Math.min()メソッドを使用します。

// 例1: 最小値を取得
var num1 = 10;
var num2 = 5;
var num3 = 20;

var minNum = Math.min(num1, num2, num3);

console.log(minNum); // 5
// num1、num2、num3のうち最小値をMath.min()メソッドで取得し、minNumに代入しています

// Math.floor()
// Mathオブジェクトを使用して、数値を整数にするには、Math.floorメソッドを使用します。

// 例1: Math.floor()を使用して、数値を整数にする
var num1 = 3.14;
var num2 = 5.87;

var intNum1 = Math.floor(num1);
var intNum2 = Math.floor(num2);

console.log(intNum1); // 3
console.log(intNum2); // 5
// Math.floorメソッドは、引数として与えられた数値を小数点以下を切り捨てて最大の整数に丸めた値を返します。

// Math.ceil()
// Mathオブジェクトを使用して、数値を整数にするには、Math.ceilメソッドも使用できます。

// 例1: Math.ceil()を使用して、数値を整数にする
var num3 = 3.14;
var num4 = 5.87;

var intNum3 = Math.ceil(num3);
var intNum4 = Math.ceil(num4);

console.log(intNum3); // 4
console.log(intNum4); // 6
// Math.ceilメソッドは、引数として与えられた数値を小数点以下を切り上げて最小の整数に丸めた値を返します。

// Math.random()
// Math.random()を使用して、乱数を生成することができます。Math.random()は0〜1未満（1は入らない）までの小数による乱数を生成します。

//生成した乱数を変数randomに代入する
var random = Math.random();

console.log(random);
// 範囲を決めた乱数を作るときには、Math.random()に最大値を掛けることで実装できます。

// 例1: 0 〜 10の範囲で乱数を作成
var random = Math.floor(Math.random() * 11);

console.log(random);
// Math.random()は0〜1未満（0〜0.9999････）の小数を返すので、最大値の10をそのまま掛けてしまうと0 〜 9の範囲になってしまう。そのため、最大値に1を足して「11」を掛けることで、0 〜 10の範囲を設定しています。
// また、整数にするには、小数点を切り捨てれば良いので、同じくMathオブジェクトで提供されているMath.floorメソッドを使用します。
