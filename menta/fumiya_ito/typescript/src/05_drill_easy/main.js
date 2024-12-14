// boolean型
var isShow = true;
var isEditing = false;
// number型
var count = 15;
var num = 2;
var float = 2.33;
// string型
var firsName = "tarou";
var lastName = "Yamada";
var englishName = "mad";
// プリミティブ型
var isShow = true;
var count = 15;
var firstName = "tarou";
// null型
var x = null;
// undefined型
var y = undefined;
// any型
var x1 = "hello";
x1 = 1;
x1 = undefined;
x1 = [];
var isShow = true;
var count = 15;
var firstName = "tarou";
var lastName = "suzuki";
// 型推論
var isShow = true;
var count = 15;
var firstName = "tarou";
// 推論された型に合う値を入れてください
isShow = false;
count = 10;
firstName = "hoge";
var taro1 = { name: "tarou", age: 30 };
var jiro1 = { name: "jiro", age: 22 };
var taro2 = {
    name: "tarou",
    age: 30,
    email: undefined,
};
var jiro2 = {
    name: "jiro",
    age: 22,
    email: "jiro@code-lesson.com",
};
var taro3 = { name: "tarou", age: 30 };
var jiro3 = { name: "jiro", age: 22, email: "jiro@code-lesson.com" };
var person = {
    name: "taro",
    age: 20,
    email: "taro@taro.com",
};
var fruits = ["apple", "orange", "lemon"];
var nums = [1, 2, 3];
// 関数の引数の型定義
var main = function (num) {
    return num + num;
};
console.log(main(15)); //30
// 関数の返り値の型定義
var func1 = function (str) { return "hello" + str; };
var func2 = function (str) { return ["hello"].push(str); };
var func3 = function (str) { return console.log("hello" + str); };
// 関数型
var func4 = function (num) { return num * 2; };
var func5 = function (num) { return num + "px"; };
var hello = "hello";
var num1 = 1;
var str1 = "1";
var fruit1 = "apple";
var fruit2 = "orange";
var fruit3 = "lemon";
// 定数オブジェクト
var LANGUAGE = {
    ENGLISH: "ENGLISH",
    JAPANESE: "JAPANESE",
    CHINESE: "CHINESE",
};
console.log(LANGUAGE.JAPANESE);
// 値から型変換
var isShow = true;
var count = 15;
var firstName = "tarou";
var sports = ["tennis", "soccer"];
var user = { id: 1, name: "jiro" };
// 型アサーション(unknown)
var func = function (x) {
    var str = x;
    var num = x;
    var bool = x;
};
// 型アサーション(null)
var func6 = function (x) {
    var str = x;
};
var func7 = function (x) {
    var num = x;
};
// 型アサーション(!)
var func8 = function (x) {
    var str = x;
};
var func9 = function (x) {
    var num = x;
};
// 型ガード（?）
var func10 = function (x) {
    console.log(x === null || x === void 0 ? void 0 : x.length);
};
var func11 = function (x) {
    console.log(x === null || x === void 0 ? void 0 : x.toString());
};
var person5 = {
    name: "hoge",
    age: 25,
    email: "hoge",
};
// Parameters
var func14 = function (a, b) {
    return a + b;
};
// ReturnType
var func15 = function () {
    return {
        name: "taro",
        age: 25,
        email: "taro@example.com",
    };
};
