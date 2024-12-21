"use client";
import { useState } from "react";

import { Main } from "@components/Main";
import { Footer } from "@components/Footer";
import { Header } from "@components/Header";

export default function Home() {
  const [counter, setCounter] = useState(1);
  const handleClick = () => {
    setCounter((prevCounter) => prevCounter + 1);
    console.log(counter);
  };

  return (
    <div className="grid grid-rows-[20px_1fr_20px] items-center justify-items-center min-h-screen p-8 pb-20 gap-16 sm:p-20 font-[family-name:var(--font-geist-sans)]">
      <Header />
      <h1>{counter}</h1>
      <button onClick={() => handleClick()}>button</button>
      <Main title="Index Page" page="app/page.js" />
      <Footer />
    </div>
  );
}
