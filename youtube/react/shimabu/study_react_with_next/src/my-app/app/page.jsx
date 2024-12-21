"use client";
import { useCallback, useEffect } from "react";

import { Main } from "@components/Main";
import { Footer } from "@components/Footer";
import { Header } from "@components/Header";

export default function Home() {
  const handleClick = useCallback(() => {
    console.log("hoge");
  }, []);

  useEffect(() => {
    document.body.style.backgroundColor = "lightblue";

    return () => {
      document.body.style.backgroundColor = "";
    };
  }, []);
  return (
    <div className="grid grid-rows-[20px_1fr_20px] items-center justify-items-center min-h-screen p-8 pb-20 gap-16 sm:p-20 font-[family-name:var(--font-geist-sans)]">
      <Header />
      <a href="/" onClick={handleClick}>
        button
      </a>
      <Main title="Index Page" page="app/page.js" />
      <Footer />
    </div>
  );
}
