
export const TodoList = ({todos, onEdit, onDelete, onChangeStatus}) => (
  <ul>
    {todos.map((todo) => (
      <li key={todo.id}>id: {todo.id}, title: {todo.title}, status: {todo.status}, desc: {todo.description}
        <select 
            value={todo.status}
            onChange={(e)=>onChangeStatus(todo, e)}
        >
            <option value="todo">todo</option>
            <option value="wip">wip</option>
            <option value="done">done</option>
        </select>
        <button onClick={() => onEdit(todo)}>edit</button>
        <button onClick={()=>onDelete(todo)}>delete</button>
      </li>
    ))}
  </ul>

)