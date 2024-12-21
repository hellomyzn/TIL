"use client";
import { useState, useCallback } from "react";

import { Main } from "@components/Main";
import { Footer } from "@components/Footer";
import { Header } from "@components/Header";

export default function Home() {
  const [counter, setCounter] = useState(1);
  const [text, setText] = useState("");
  const [isShow, setIsShow] = useState(false);

  const handleClick = () => {
    setCounter((prevCounter) => prevCounter + 1);
    console.log(counter);
  };

  const handleChange = useCallback((e) => {
    if (e.target.value >= 5) {
      alert("hoge");
    }
    setText(e.target.value.trim());
  }, []);

  const handleToggleButton = useCallback(() => {
    setIsShow((prevIsShow) => !prevIsShow);
  }, []);

  return (
    <div className="grid grid-rows-[20px_1fr_20px] items-center justify-items-center min-h-screen p-8 pb-20 gap-16 sm:p-20 font-[family-name:var(--font-geist-sans)]">
      <Header />
      {isShow ? <h1>{counter}</h1> : null}
      <button onClick={() => handleClick()}>button</button>
      <button onClick={handleToggleButton}>
        {isShow ? "hide counter" : "show counter"}
      </button>
      <input type="text" value={text} onChange={handleChange} />
      <Main title="Index Page" page="app/page.js" />
      <Footer />
    </div>
  );
}
