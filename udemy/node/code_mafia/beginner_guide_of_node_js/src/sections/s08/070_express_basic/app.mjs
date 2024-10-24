import * as http from "http";
import express from "express";

const PORT = 3000;
const app = express();

app.use(express.urlencoded({ extended: true }));

app.get("/", (req, res) => {
  res.send(`
    <a href="/result?param1=1&param2=2">Get Method Link</a>
    <form action="/result" method="POST">
      <input type="text" name="title">
      <input type="text" name="description">
      <input type="submit">
    </form>
    `);
});

app.get("/result", (req, res) => {
  const params = req.query;
  console.log(params);
  res.send("result: GET");
});

app.post("/result", (req, res) => {
  const params = req.body;
  console.log(params);
  res.send("result: POST");
});

app.listen(PORT, () => {
  console.log(`Server start: http://localhost:${PORT}`);
});
