import type { Article } from "./types";
export const getAllArticles = async (): Promise<Article[]> => {
  const res = await fetch("https://localshost:3001/posts", {
    cache: "no-store",
  });
};
