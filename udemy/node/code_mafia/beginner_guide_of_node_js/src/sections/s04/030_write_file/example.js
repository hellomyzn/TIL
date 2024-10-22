console.log("hello, node.js");
console.log(__dirname);
console.log(__filename);

const fs = require("fs");
fs.writeFileSync(`${__dirname}/hoge.txt`, "hello, node.js");
