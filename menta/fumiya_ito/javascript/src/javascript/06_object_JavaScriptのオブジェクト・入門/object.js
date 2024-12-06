// オブジェクト
// オブジェクトは複数のプロパティを持つデータ構造です。
// オブジェクトは {}の中にデータのキー(プロパティ名)と値を:(コロン) でつなげて書きます。
var object = {
  key1: "value1",
  key2: "value2",
};

// 例1 変数userにuserName: BobとuserId: 10のプロパティを含めたオブジェクトを宣言し、コンソールに出力
var user = {
  userName: "Bob",
  userId: 10,
};
console.log(user); // {userName: "Bob", userId: 10}

// オブジェクトのプロパティ値取得
// オブジェクトは以下のように値を取得します。
// console.log(オブジェクト.プロパティ名）// ドット記法
// console.log(オブジェクト['プロパティ名']）// ブラケット記法

// 例1 ドット記法で、userDetailオブジェクトからageを取得し、コンソールに出力
var userDetail = {
  age: 25,
  hobby: "読書",
};
console.log(userDetail.age); // 25

// 例2 ブラケット記法で、userDetailオブジェクトからhobbyを取得し、コンソールに出力
var userDetail = {
  age: 25,
  hobby: "読書",
};
console.log(userDetail["hobby"]); // '読書'

// オブジェクトにある特定の値の更新
// オブジェクトは、以下のように値を更新します。
var object = {
  key1: "value1",
  key2: "value2",
};
object.key1 = "new value1"; // ドット記法
object["key2"] = "new value2"; // ブラケット記法
console.log(object.key1); // 'new value1'
console.log(object["key2"]); // 'new value2'

// 例1 ドット記法で、userDetailオブジェクトからageを30に更新し、コンソールに出力
var userDetail = {
  age: 25,
  hobby: "読書",
};
userDetail.age = 30;
console.log(userDetail.age); // 30

// 例2 ブラケット記法で、userDetailオブジェクトからhobbyをゲームに更新し、コンソールに出力
var userDetail = {
  age: 25,
  hobby: "読書",
};
userDetail["hobby"] = "ゲーム";
console.log(userDetail["hobby"]); // ゲーム

// オブジェクトに新しいプロパティを追加
// オブジェクトに新しいプロパティを追加するには、以下のように実装します。
// object.newProperty = value; // ドット記法
// object["newProperty"] = value; // ブラケット記法

// 例1 ドット記法を使用し、personオブジェクトにageプロパティを追加
var person = {
  userName: "John",
};
person.age = 20;
console.log(person); // {userName: 'John', age: 20}

// 例2 ブラケット記法を使用し、personオブジェクトにcountryプロパティを追加
var person = {
  userName: "John",
  age: 20,
};
person["country"] = "Japan";
console.log(person); // {userName: 'John', age: 20, country: 'Japan'}

// オブジェクトのプロパティを削除
// オブジェクトのプロパティを削除するには、以下のように実装します。
// delete object.property // ドット記法
// delete object['property'] // ブラケット記法
// 削除されたプロパティ値はundefinedとコンソールに出力されます。

// 例1 ドット記法で、personオブジェクトからageプロパティを削除
var person = {
  userName: "John",
  age: 20,
  country: "America",
};
delete person.age;
console.log(person.age); // undefined

// 例2 ブラケット記法で、personオブジェクトからcountryプロパティを削除
var person = {
  userName: "John",
  age: 20,
  country: "America",
};
delete person["country"];
console.log(person.country); // undefined

// スプレッド構文（オブジェクト）
// スプレッド構文を使用することで、オブジェクトを複製することができます。

// 例1 オブジェクトを複製
var product = {
  name: "PC",
  price: 50000,
};
var copy = { ...product };
console.log(copy); // { name: 'PC',  price: 50000 }

// 例2 オブジェクトの特定のプロパティの値を更新して代入
// 同じプロパティがある場合は、新しい値に更新されます。
var product = {
  name: "PC",
  price: 50000,
};
var updateProduct = { ...product, price: 30000 };
console.log(updateProduct); // { name: 'PC',  price: 30000 }

// 分割代入（オブジェクト）
// オブジェクトに対して分割代入を使用することで、オブジェクトから特定のプロパティを取得し、新たな変数に代入することができます。

// 例1 元のプロパティ名と同じ名前の変数に分割代入
var object = { x: 1, y: 2 };
var { x, y } = object;
console.log(x); // 1
console.log(y); // 2

// 例2 元のプロパティ名とは異なる名前の変数に分割代入
var object = { x: 1, y: 2 };
var { x: a, y: b } = object;
console.log(a); // 1
console.log(b); // 2
