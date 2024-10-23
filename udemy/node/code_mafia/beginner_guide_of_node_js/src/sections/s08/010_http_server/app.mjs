import * as http from "http";

const server = http.createServer((req, res) => {
  console.log(req.url);
  res.end("bye");
});

server.listen(3000);
