import logo from './logo.svg';
import './App.css';
import { useState, useEffect } from 'react';

import { AddForm } from './components/AddForm';
import { EditForm } from './components/EditForm';
import { TodoList } from './components/TodoList';
import { useTodoManager } from './hooks/useTodoManager';

function App() {
  const {
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
  } = useTodoManager();

  const statusTodo = "todo"
  const statusWip = "wip"
  const statusDone = "done"

  const [filteredTodos, setFilteredTodos] = useState([])
  const [filter, setFilter] = useState('all')


  useEffect(() => {
    switch (filter) {
      case statusTodo:
        setFilteredTodos(todos.filter((todo) => todo.status === statusTodo))
        break
      case statusWip:
        setFilteredTodos(todos.filter((todo) => todo.status === statusWip))
        break
      case statusDone:
        setFilteredTodos(todos.filter((todo) => todo.status === statusDone))
        break
      default:
        setFilteredTodos(todos)
    }
  }, [filter, todos])

  return (
    <>
    <div className='App'>
      <h1>TODO</h1>
      { isEditable ? (
        <EditForm 
          title={editTitle}
          description={editDescription}
          onTtitleChange={(e) => setEditTitle(e.target.value)}
          onDescriptionChange={(e) => setEditDescription(e.target.value)}
          onSave={handleEditTodo}
          onCancel={handleCloseEditForm}
        />
      ):(
        <AddForm 
          title={todoTitle}
          description={todoDescription}
          onTtitleChange={(e) => setTodoTitle(e.target.value)}
          onDescriptionChange={(e) => setTodoDescription(e.target.value)}
          onAdd={handleAddTodo}
        />
      )}
      <select value={filter} onChange={(e) => setFilter(e.target.value)}>
        <option value="all">すべて</option>
        <option value="todo">未着手</option>
        <option value="wip">作業中</option>
        <option value="done">完了</option>
      </select>


      <TodoList 
        todos={filteredTodos}
        onEdit={handleOpenEditForm}
        onDelete={handleDeleteTodo}
        onChangeStatus={handleStatusChange}
      />
    </div>
    </>
  );
}

export default App;
