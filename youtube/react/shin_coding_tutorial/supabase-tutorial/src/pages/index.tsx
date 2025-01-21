import Image from "next/image";
import { Inter } from "next/font/google";
import TodoApp from "@/components/TodoApp";

const inter = Inter({ subsets: ["latin"] });

export default function Home() {
  return (
    <section className="flex justify-center items-center h-screen bg-white text-black">
      <TodoApp />
    </section>
  );
}
