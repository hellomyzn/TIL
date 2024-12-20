import { useState } from 'react';

export const useTodoManager = ( )=> {
  const [todos, setTodos] = useState([])
  const [todoId, setTodoId] = useState(todos.length + 1)
  const [todoTitle, setTodoTitle] = useState("")
  const [todoStatus, setTodoStatus] = useState("")
  const [todoDescription, setTodoDescription] = useState("")
  const handleAddTodo = () => {
    if (!todoTitle.trim() || !todoDescription.trim()) return;

    setTodos((prevTodos) => [
      ...prevTodos, 
      {
        id: todoId,
        title: todoTitle.trim(),
        status: "todo",
        description: todoDescription.trim()
      },
    ]);

    setTodoId((prevTodoId) => prevTodoId + 1)
    setTodoTitle('')
    setTodoDescription('')
  }

  const handleDeleteTodo = (targetTodo) => {
    setTodos((prevTodos) => prevTodos.filter((todo)=>todo.id !== targetTodo.id))
  }

  const [isEditable, setIsEditable] = useState(false)
  const [editId, setEditId] = useState(null)
  const [editTitle, setEditTitle] = useState("")
  const [editDescription, setEditDescription] = useState("")
  const handleOpenEditForm = (todo) => {
    setIsEditable(true)
    setEditId(todo.id)
    setEditTitle(todo.title)
    setEditDescription(todo.description)
  }

  const handleEditTodo = () => {
    if (!editTitle.trim() || !editDescription.trim()) return;

    setTodos((prevTodos) => 
      prevTodos.map((todo) => 
        todo.id === editId
          ? {...todo, title: editTitle.trim(), description: editDescription.trim()}
          : todo
      )
    );
    handleCloseEditForm();

  }

  const handleCloseEditForm = () => {
    setIsEditable(false);
    setEditId(null);
    setEditTitle("");
    setEditDescription("");
  }

  const handleStatusChange = (targetTodo, e) => {
    setTodos((prevTodos) => 
      prevTodos.map((todo) => 
        todo.id === targetTodo.id ? {...todo, status: e.target.value}: todo
      )
    );

  }

  return {
    todos,
    todoId,
    todoTitle,
    todoStatus,
    todoDescription,
    isEditable,
    editId,
    editTitle,
    editDescription,
    // set
    setTodos,
    setTodoId,
    setTodoTitle,
    setTodoStatus,
    setTodoDescription,
    setIsEditable,
    setEditId,
    setEditTitle,
    setEditDescription,
    // handle
    handleAddTodo,
    handleDeleteTodo,
    handleOpenEditForm,
    handleCloseEditForm,
    handleEditTodo,
    handleStatusChange,
  }

}