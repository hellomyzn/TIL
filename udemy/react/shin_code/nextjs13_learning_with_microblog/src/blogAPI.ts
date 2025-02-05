import { resolve } from "path";
import type { Article } from "./types";
import { notFound } from "next/navigation";

export const getAllArticles = async (): Promise<Article[]> => {
  const res = await fetch(`http://localhost:3001/posts`, {
    cache: "no-store", //SSR
  });

  if (!res.ok) throw new Error("An error has occurred.");

  const articles = await res.json();
  return articles;
};

export const getDetailArticle = async (id: string): Promise<Article> => {
  const res = await fetch(`http://localhost:3001/posts/${id}`, {
    next: { revalidate: 60 }, //ISR
  });

  if (res.status === 404) {
    notFound();
  }

  if (!res.ok) throw new Error("An error has occurred.");

  const article = await res.json();
  return article;
};
