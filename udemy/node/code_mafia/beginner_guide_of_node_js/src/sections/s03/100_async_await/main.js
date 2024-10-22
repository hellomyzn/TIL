// 非同期処理（Promise）
let a = 0;
async function init() {
  try {
    let result = await new Promise((resolve, reject) => {
      setTimeout(() => {
        a = 1;
        reject(a);
      }, 2000);
    });
    console.log(result);
  } catch (e) {
    console.log("catchが実行", e);
  }
}
init();

const hoge = async () => {
  const result2 = await new Promise((resolve, reject) => {
    setTimeout(() => {
      a = 2;
      resolve(a);
    }, 5000);
  });
  console.log(result2);
};

hoge();
