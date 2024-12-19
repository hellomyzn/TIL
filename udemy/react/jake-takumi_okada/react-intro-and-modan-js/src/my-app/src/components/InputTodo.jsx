const style = {
  backgroundColor: "aqua",
  width: "400px",
  height: "30px",
  padding: "8px",
  margin: "8px",
  borderRadius: "8px",
};
export const InputTodo = ({ todoText, onChange, onClick, disabled }) => {
  return (
    <>
      <div style={style}>
        <input
          disabled={disabled}
          placeholder="TODOを入力"
          value={todoText}
          onChange={onChange}
        />
        <button disabled={disabled} onClick={onClick}>
          add
        </button>
      </div>
    </>
  );
};
