let a = 0;
console.log(a);

new Promise((resolve, reject) => {
  setTimeout(() => {
    a = 1;
    resolve(a);
    // reject(a);
  }, 2000);
})
  .then((b) => {
    console.log(b);
    return b;
  })
  .then((b) => {
    console.log(b);
  })
  .catch((e) => {
    console.log("catch", e);
  });

console.log(a);
