import React from "react";
import Image from "next/image";
import Link from "next/link";
import type { Article } from "@/types";

type ArticleCardPropls = {
  article: Article;
};

const ArticleCart = ({ article }: ArticleCardPropls) => {
  return (
    <article className="shadow my-4 flex flex-col" key={article.id}>
      <Link href={`articles/${article.id}`} className="hover:opacity-75">
        <Image
          src={`https://picsum.photos/1000/500?sig=${article.id}`}
          alt=""
          width={1280}
          height={30}
        />
      </Link>
      <div className="bg-white flex flex-col justify-start p-6">
        <Link
          href={`articles/${article.id}`}
          className="text-blue-700 pb-4 font-bold"
        >
          Technology
        </Link>
        <Link
          href="#"
          className="text-slate-900 text-3xl font-bold hover:text-gray-700 pb-4"
        >
          {article.title}
        </Link>
        <p className="text-sm pb-3 text-slate-900">
          By the person, published on{" "}
          {new Date(article.createdAt).toLocaleDateString()}
        </p>
        <Link href={`articles/${article.id}`} className="text-slate-900 pb-6">
          {article.content.length > 70
            ? `${article.content.substring(0, 70)}...`
            : article.content}
        </Link>
        <Link
          href={`articles/${article.id}`}
          className="text-pink-800 hover:text-black"
        >
          read more
        </Link>
      </div>
    </article>
  );
};

export default ArticleCart;
