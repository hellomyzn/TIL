import * as http from "http";
import express from "express";

const PORT = 3000;
const app = express();

app.get("/", function (req, res) {
  res.send({ message: "hello" });
});

app.listen(PORT, function () {
  console.log(`Server start: http://localhost:${PORT}`);
});
