import { supabase } from "../utils/supabase";

export const getAllTodos = async () => {
  const todos = await supabase.from("todo").select("");
  return todos.data;
};

export const addTodo = async (title: string) => {
  const todo = await supabase.from("todo").insert({
    title: title,
  });
  return todo.data;
};

export const deleteTodo = async (id: number) => {
  await supabase.from("todo").delete().eq("id", id);
};
