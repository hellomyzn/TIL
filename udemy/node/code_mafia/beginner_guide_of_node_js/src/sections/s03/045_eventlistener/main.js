const h1EElement = document.querySelector("h1");
console.dir(h1EElement);
console.log(h1EElement.textContent);
h1EElement.textContent = "Changed title";

const btnEl = document.querySelector("button");
const helloFn = (e) => {
  console.dir(e.target.textContent);
  console.log("hello");
};

btnEl.addEventListener("click", helloFn);
