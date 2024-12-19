export const CompleteTodos = ({ todos, onClickBack }) => {
  return (
    <>
      <div className="complete-area">
        <p className="title">complete todo</p>
        <ul>
          {todos.map((todo, index) => (
            <li key={todo}>
              <div className="list-row">
                <p className="todo-item">{todo}</p>
                <button onClick={() => onClickBack(index)}>back</button>
              </div>
            </li>
          ))}
        </ul>
      </div>
    </>
  );
};
