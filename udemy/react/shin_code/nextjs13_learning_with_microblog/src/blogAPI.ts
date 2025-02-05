import type { Article } from "./types";

export const getAllArticles = async (): Promise<Article[]> => {
  const res = await fetch(`http://localhost:3001/posts`, {
    cache: "no-store", //SSR
  });

  if (!res.ok) throw new Error("An error has occurred.");

  const articles = await res.json();
  return articles;
};
