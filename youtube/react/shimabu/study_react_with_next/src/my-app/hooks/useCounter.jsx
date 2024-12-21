import { useState, useCallback } from "react";

export const useCounter = () => {
  const [counter, setCounter] = useState(1);
  const [isShow, setIsShow] = useState(false);
  const handleClick = () => {
    setCounter((prevCounter) => prevCounter + 1);
  };
  const handleToggleButton = useCallback(() => {
    setIsShow((prevIsShow) => !prevIsShow);
    const useBgLightBlue = () => {
      useEffect(() => {
        document.body.style.backgroundColor = "lightblue";

        return () => {
          document.body.style.backgroundColor = "";
        };
      }, []);
    };
  }, []);

  return { counter, isShow, handleClick, handleToggleButton };
};
