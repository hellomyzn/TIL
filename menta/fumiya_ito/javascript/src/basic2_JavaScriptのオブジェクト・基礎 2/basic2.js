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
