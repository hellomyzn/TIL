const onClickAdd = () => {
  const inputText = document.getElementById("add-text").value;
  document.getElementById("add-text").value = "";
  createIncompleteTodo(inputText);
};

const createIncompleteTodo = (todo) => {
  const li = document.createElement("li");

  const div = document.createElement("div");
  div.className = "list-row";

  const p = document.createElement("p");
  p.className = "todo-item";
  p.innerText = todo;

  const incompleteList = document.getElementById("incomplete-list");
  const completeList = document.getElementById("complete-list");

  const completeButton = document.createElement("button");
  completeButton.innerText = "done";

  const deleteButton = document.createElement("button");
  deleteButton.innerText = "delete";

  completeButton.addEventListener("click", () => {
    const doneTarget = completeButton.closest("li");
    completeButton.nextElementSibling.remove();
    completeButton.remove();

    const backButton = document.createElement("button");
    backButton.innerText = "back";
    doneTarget.firstElementChild.appendChild(backButton);
    backButton.addEventListener("click", () => {
      const todoText = backButton.previousElementSibling.innerText;
      createIncompleteTodo(todoText);
      backButton.closest("li").remove();
    });

    incompleteList.removeChild(doneTarget);
    completeList.appendChild(doneTarget);
  });

  deleteButton.addEventListener("click", () => {
    const deleteTarget = deleteButton.closest("li");
    incompleteList.removeChild(deleteTarget);
  });

  li.appendChild(div);
  div.appendChild(p);
  div.appendChild(completeButton);
  div.appendChild(deleteButton);
  incompleteList.appendChild(li);
};

document.getElementById("add-button").addEventListener("click", onClickAdd);
