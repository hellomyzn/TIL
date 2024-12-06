// Promise
// Promiseを返す関数を作る事ができる。
// 非同期通信する関数をラップしたいときなどに使う。

// 例1 1秒後に、変数numberの値によってレスポンスを返す処理を実行します
var number = 10;
var myPromise = () => {
  return new Promise((resolve, reject) => {
    setTimeout(() => {
      if (number < 15) {
        resolve("numberが15未満です");
      } else {
        reject("numberが15未満ではありません");
      }
    }, 1000);
  });
};
myPromise()
  .then((value) => console.log(value)) // 'numberが15未満です'
  .catch((error) => console.log(error));

// 例2 1秒後に、引数の有無によってレスポンスを返す処理を実行します
var myPromise = (data) => {
  return new Promise((resolve, reject) => {
    setTimeout(() => {
      if (data) {
        resolve(data);
      } else {
        reject("Error!");
      }
    }, 1000);
  });
};

myPromise("Success")
  .then((value) => console.log(value)) // 'Success'
  .catch((error) => console.log(error));
myPromise()
  .then((value) => console.log(value))
  .catch((error) => console.log(error)); // 'Error!'

// Promise/resolve
// Promise内で処理成功時に実行されるメソッド。
// resolveメソッドが呼び出されたときに、.thenメソッドが呼び出されます。

// 例1 1秒後に、文字列'numberが15未満です'というレスポンスを返す処理を実行します

var number = 10;
var myPromise = () => {
  return new Promise((resolve, reject) => {
    setTimeout(() => {
      if (number < 15) {
        resolve("numberが15未満です");
      }
    }, 1000);
  });
};
myPromise().then((value) => console.log(value)); // 'numberが15未満です'

// 例2 1秒後に、文字列'Success'というレスポンスを返す処理を実行します
var myPromise = (data) => {
  return new Promise((resolve, reject) => {
    setTimeout(() => {
      if (data) {
        resolve(data);
      }
    }, 1000);
  });
};
myPromise("Success").then((value) => console.log(value)); // 'Success'

// Promise/reject
// Promise内で処理失敗時に実行されるメソッド。
// rejectメソッドが呼び出されたときや、Errorが投げられたときに.catchメソッドが呼び出されます。

// 例1 1秒後に、文字列'numberが15未満ではありません'というレスポンスを返す処理を実行します
var number = 10;
var myPromise = () => {
  return new Promise((resolve, reject) => {
    setTimeout(() => {
      if (number < 15) {
        resolve("numberが15未満です");
      } else {
        reject("numberが15未満ではありません");
      }
    }, 1000);
  });
};

myPromise().catch((error) => console.log(error)); // 'numberが15未満ではありません'
// 例2 1秒後に、文字列'Error!'というレスポンスを返す処理を実行します
var myPromise = (data) => {
  return new Promise((resolve, reject) => {
    setTimeout(() => {
      if (data) {
        resolve(data);
      } else {
        reject("Error!");
      }
    }, 1000);
  });
};

myPromise().catch((error) => console.log(error)); // 'Error!'

// Promise.all()
// 引数に渡したすべてのPromiseを実行する。
// すべて完了or1つでもエラーで処理は終了する。

// var URL = "http://hoge-hoge";
// Promise.all([fetch(URL), fetch(URL), fetch(URL)]).then((res) => {
//   console.log(res); // 正常に３つとも終われば3回結果が表示される
// });

// Promise.race()
// 引数に渡したPromiseを実行し、最初に完了したPromiseオブジェクトを返します。

// 例1 文字列'Success2'をコンソールに出力します
var samplePromise = (data) => {
  return new Promise((resolve) => {
    setTimeout(() => {
      resolve(data);
    }, 3000);
  });
};
var samplePromise2 = (data) => {
  return new Promise((resolve) => {
    setTimeout(() => {
      resolve(data);
    }, 1000);
  });
};
// この下に回答を記述してください
Promise.race([samplePromise("Success1"), samplePromise2("Success2")]).then(
  (value) => {
    console.log(value);
  }
);
// 'Success2'
