console.log("hello, node.js");
console.log(__dirname);
console.log(__filename);

const fs = require("fs");
const path = require("path");
const distPath = path.resolve(__dirname, "./hoge/hogehoge.txt");
console.log(distPath);
fs.writeFileSync(`${__dirname}/hoge.txt`, "hello, node.js");
fs.writeFileSync(distPath, "hello, node.js");
