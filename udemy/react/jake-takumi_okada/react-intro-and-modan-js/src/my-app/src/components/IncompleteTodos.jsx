export const IncompleteTodos = ({ todos, onClickComplete, onClickDelete }) => {
  return (
    <>
      <div className="incomplete-area">
        <p className="title">incomplete todo</p>
        <ul>
          {todos.map((todo, index) => (
            <li key={todo}>
              <div className="list-row">
                <p className="todo-item">{todo}</p>
                <button onClick={() => onClickComplete(index)}>done</button>
                <button onClick={() => onClickDelete(index)}>delete</button>
              </div>
            </li>
          ))}
        </ul>
      </div>
    </>
  );
};
