"use client";

import { Main } from "@components/Main";
import { Footer } from "@components/Footer";
import { Header } from "@components/Header";

import { useBgColor } from "@hooks/useBgColor";
import { useCounter } from "@hooks/useCounter";
import { useInputArray } from "@hooks/useInputArray";

export default function About() {
  const { counter, isShow, handleClick, handleToggleButton } = useCounter();
  const { text, array, handleChange, handleAdd } = useInputArray();
  useBgColor();

  return (
    <div className="grid grid-rows-[20px_1fr_20px] items-center justify-items-center min-h-screen p-8 pb-20 gap-16 sm:p-20 font-[family-name:var(--font-geist-sans)]">
      <Header />

      {isShow ? <h1>{counter}</h1> : null}
      <button onClick={() => handleClick()}>button</button>
      <button onClick={handleToggleButton}>
        {isShow ? "hide counter" : "show counter"}
      </button>

      <input type="text" value={text} onChange={handleChange} />
      <button onClick={() => handleAdd()}> add</button>
      <ul>
        {array.map((item) => (
          <li key={item}>{item}</li>
        ))}
      </ul>

      <Main title="About Page" page="app/about/page.js" />
      <Footer />
    </div>
  );
}
