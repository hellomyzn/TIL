import React from "react";
import type { Article } from "@/types";
import ArticleCart from "./ArticleCart";

type ArticleListProps = {
  articles: Article[];
};

const ArticleList = ({ articles }: ArticleListProps) => {
  return (
    <div>
      {articles.map((article) => (
        <ArticleCart article={article}></ArticleCart>
      ))}
    </div>
  );
};

export default ArticleList;
