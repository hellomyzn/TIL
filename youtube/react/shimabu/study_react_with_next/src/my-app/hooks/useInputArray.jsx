import { useState, useCallback } from "react";

export const useInputArray = () => {
  const [text, setText] = useState("");
  const [array, setArray] = useState([[]]);

  const handleChange = useCallback((e) => {
    if (e.target.value >= 5) {
      alert("hoge");
    }
    setText(e.target.value.trim());
  }, []);

  const handleAdd = useCallback(() => {
    if (array.some((arr) => arr === text)) {
      alert("the text exists");
      setText("");
      return;
    }
    setArray((prevArray) => [...prevArray, text]);
    setText("");
  }, [array, text]);
  return { text, array, handleChange, handleAdd };
};
