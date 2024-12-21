import { useState, useCallback, useMemo } from "react";

export const useCounter = () => {
  const [counter, setCounter] = useState(1);
  const doubleCount = useMemo(() => {
    return counter * 2;
  }, [counter]);
  const [isShow, setIsShow] = useState(false);
  const handleClick = () => {
    setCounter((prevCounter) => prevCounter + 1);
  };
  const handleToggleButton = useCallback(() => {
    setIsShow((prevIsShow) => !prevIsShow);
  }, []);

  return { counter, isShow, handleClick, handleToggleButton, doubleCount };
};
