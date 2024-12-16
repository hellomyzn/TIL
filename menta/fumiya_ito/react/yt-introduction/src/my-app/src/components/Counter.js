import React, { useState } from "react";

const Counter = () => {
  const [count, setCount] = useState(0);
  const onCountUp = () => {
    setCount(count + 1);
  };
  const onCountDown = () => {
    setCount(count - 1);
  };
  return (
    <React.Fragment>
      <p>Count: {count}</p>
      <button className="ui primary button" onClick={onCountUp}>
        Increament
      </button>
      <button className="ui red button" onClick={onCountDown}>
        Decrement
      </button>
    </React.Fragment>
  );
};

export default Counter;
