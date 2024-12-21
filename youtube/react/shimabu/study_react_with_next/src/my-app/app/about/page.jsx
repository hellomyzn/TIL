"use client";
import { useCallback, useEffect } from "react";

import { Main } from "@components/Main";
import { Footer } from "@components/Footer";
import { Header } from "@components/Header";

export default function About() {
  useEffect(() => {
    document.body.style.backgroundColor = "lightblue";

    return () => {
      document.body.style.backgroundColor = "";
    };
  }, []);
  return (
    <div className="grid grid-rows-[20px_1fr_20px] items-center justify-items-center min-h-screen p-8 pb-20 gap-16 sm:p-20 font-[family-name:var(--font-geist-sans)]">
      <Header />
      <Main title="About Page" page="app/about/page.js" />
      <Footer />
    </div>
  );
}
