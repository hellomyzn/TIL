import React from "react";
import TodoList from "./TodoList";

function TodoApp() {
  return (
    <section className="text-center mb-2 text-2x1 font-medium">
      <h3>Supabase Todo App</h3>
      <form action="">
        <input type="text" className="shadow-lg p-1 mr-2 outline-none" />
        <button className="shadow-md border-2 px-1 py-1 rounded-lg bg-green-200">
          Add
        </button>
      </form>
      <TodoList />
    </section>
  );
}

export default TodoApp;
