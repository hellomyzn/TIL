// コールバック関数
// コールバック関数は他の関数に引数として渡される関数です。

// 例1: 関数runTwiceの引数に関数greetを渡す
var greet = () => {
  console.log("Hello world!");
};

var runTwice = (func) => {
  func();
  func();
};

runTwice(greet);
// 'Hello world!'
// 'Hello world!'

// 例2: 関数runTwiceの引数に無名関数を渡す;
var runTwice = (func) => {
  func();
  func();
};

runTwice(() => {
  console.log("Hello world!");
});
// 'Hello world!'
// 'Hello world!'
