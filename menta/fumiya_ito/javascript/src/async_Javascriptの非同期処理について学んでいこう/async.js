// fetch(Javascript)
// fetchとは日本語で「取ってくる」といったような意味があります。
// JavaScriptではサーバーからデータなどを取得する時にfetchを使用します。
// データを取得する先のURLをfetchの第一引数に記述します。fetch実行後の戻り値はあとのレクチャーで解説するPromiseが返却されます。
// このPromiseが返ってくると、後続に処理をつなぐことができます。
// 後続に続ける処理というのはレスポンスが返ってきた後に行ってほしい処理のことで、これはthenというキーワードを使い、その中にコールバック関数で処理を記述します。
// コード例にあるようにthenを使いその中にコールバック関数を記述することで、データ取得後に実行したい処理を次々に記述できます

var URL = "http://hoge-hoge";
fetch(URL)
  .then((res) => {
    console.log(res); // fetchで取得したレスポンスを表示
  })
  .catch((e) => {
    console.error(e); // 失敗したらエラーを取得してコンソールに表示
  });

// setTimeout/clearTimeout
// setTimeout/clearTimeoutを使うと、指定したミリ秒後に処理を実行することができます。

// setTimeout(() => {実行したい処理}, ミリ秒)
// 戻り値は登録したidが返ってきます。

// var timeoutId = setTimeout(() => {
//   実行したい処理;
// }, ミリ秒);
// clearTimeout(timeoutId); // 実行後にclearTimeoutしないとsetTimeoutが重複してバグの要因になる

setTimeout(() => {
  console.log("５秒立ちました");
}, 5000); // よばれて５秒後にconsoleにメッセージが出力される

// setInterval/clearInterval
// setInterval/clearIntervalを使うと、指定したミリ秒ごとに繰り返して処理を実行することができます。

// setInterval(() => {実行したい処理}, ミリ秒)
// 戻り値は登録したidが返ってきます。

// const intervalId = setInterval(() => {実行したい処理}, ミリ秒)
// clearInterval(intervalId) // 実行後にclearIntervalして反復を止める

var passedTime = 0;
var countUp = setInterval(() => {
  passedTime++;
  console.log(`${passedTime}秒経過しました。`);
}, 1000);

var intervalTime = 10;
var intervalCall = setInterval(() => {
  console.log(`${intervalTime}秒経過です`);
}, 10000);
setTimeout(() => {
  clearInterval(intervalCall);
}, 30000);

// then-catch
// Promiseは、非同期処理を行う際に使用しますが、成功した場合には結果を、失敗した場合にはエラーを扱うことができます。Promiseのthenメソッドとcatchメソッドは、それぞれPromiseが成功した場合と失敗した場合の処理を定義するために使用されます。

// thenメソッド
// promise.then((result) => {
//   console.log("成功:", result);
// });

// catchメソッド
// promise.catch((error) => {
//   console.error("エラー:", error);
// });
// thenメソッドとcatchメソッドは、ドット（.）で繋げて書くことができます。このPromiseチェーンは、複数の非同期処理を順番に実行できます。リクエストに対して成功した場合や失敗した場合でそれぞれ処理を分岐させたい時などに使用します。

// promise
//   .then((result) => {
//     console.log("成功:", result);
//     return result + 1; // resultに1を加えて返す
//   })
//   .then((result) => {
//     console.log("成功:", result); // このresultは1つ目のthenでのresult + 1の値と同じ
//   })
//   .catch((error) => {
//     console.error("エラー:", error);
//   });

// axios
// axiosとは、HTTP通信を簡単に行うことができるJavaScriptライブラリです。axiosを使うとサーバーにリクエストを送ることができます。
// リクエストを送るために各種メソッドを使います。例えば、getメソッドはサーバーからデータを取得するときに使用します。メソッドの引数にはリクエスト先のURLなどを設定します。
// axiosの戻り値はPromiseであるため、thenメソッドやcatchメソッドによって処理を記述します。これにより、非同期処理を簡単に行うことができます。

// リクエスト先のURL
var url = "https://jsonplaceholder.typicode.com/users";

// リクエストに成功した場合はレスポンスを出力
// リクエストに失敗した場合はエラーを出力
// axios
//   .get(url)
//   .then((response) => console.log(response))
//   .catch((error) => console.log(error));

// async-await
// asyncとは、非同期関数を作るキーワードです。
// asyncを関数の前につけることで非同期関数を作成でき、Promiseを返す関数を自分で作成できます。
// これは、axiosやfetchのように実行後の戻り値にPromiseを含むものを自分で作成できることを意味します。
// また、asyncを使った関数内では非同期の処理の前にawaitをつけることで、コード例に
// あるように非同期処理の完了を待機させることができます。
// つまり、async/awaitを用いることでthenの処理をより簡潔に作ることができます。
// awaitはasyncがついた関数内でのみ使用できるのでasyncのキーワードがない関数の中以外では使用できません。

// var url = "https://foobar.com";
// async function asyncFunc() {
//   const response = await fetch(url); // awaitをつけることで処理の完了を待ち、次の行まで実行しない
//   const data = await response.json(); // awaitをつけることで処理の完了を待ち、次の行まで実行しない
//   console.log(data);
// }
// asyncFunc(); // 実行

// try-catch-finally
// プログラム上で発生するエラーのことを例外と呼ぶことがあります。
// JavaScriptでは例外が発生すると以降のコードが正常に実行されません
// そのため通信などのエラーが発生しそうな箇所では、エラーが発生した時に実行する処理を
// あらかじめ記述しておき、コードの実行を止めないような処理が必要となります。
// この処理を例外処理と呼びます。コード例にあるように、tryのブロックの中に
// 例外が発生する可能性のある処理を記述し、catchブロックの中には例外が発生する処理
// を記述します。finallyのブロックの中には、例外の発生する有無にかかわらず実行する処理
// を記述します。

var fetchData = async () => {
  try {
    // エラーが発生しそうなところtryで囲む

    const URL = "http://hoge-hoge";
    const result = await fetch(URL);
    console.log(result);
  } catch (e) {
    //エラーが発生した場合の処理

    console.error(e);
  } finally {
    //エラー発生の有無に関わらず行う処理

    console.log("処理が終了しました！");
  }
};
fetchData();

// throw
// throwは、コード内でエラーや問題が発生したときに、エラーを作成し、そのエラー情報を伝えます。プログラムが正常に動作しない場合や、予期しない値が入力された場合など、エラーが発生したときにエラーメッセージを表示できます。

// エラーオブジェクトの生成方法
// new Errorでエラーオブジェクトを生成し、その中に任意のエラーメッセージを設定します。throwによってエラーオブジェクトを投げることで、プログラムの実行が中断されます。

// throw new Error("エラーメッセージ");

// エラーメッセージを表示する方法
// try、catchと組み合わせることで、エラーが発生した場所を特定し、適切なエラー処理を行うことができます。

function checkNum(num) {
  if (num > 10) {
    throw new Error("10以下の数値を入力してください");
  }
  console.log("正常に終了しました");
}

try {
  checkNum(11);
} catch (error) {
  console.log(error.message); // '10以下の数値を入力してください'
}
// 上記では、引数が10よりも大きい場合に、throwによってエラーメッセージを設定しています。try、catchを使い引数に11を渡して実行した場合は、プログラムが中断され、エラーメッセージが表示されます。
