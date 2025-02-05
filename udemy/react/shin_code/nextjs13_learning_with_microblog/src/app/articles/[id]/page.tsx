import React from "react";
import Image from "next/image";
import type { Article } from "@/types";

const Article = ({ params }: { params: Article }) => {
  return (
    <div className="max-w-3xl mx-auto p-5">
      <Image
        src={`https://picsum.photos/1000/500?sig=${params.id}`}
        alt=""
        width={1280}
        height={30}
      />
      <h1 className="text-4xl text-center mb-10 mt-10">title</h1>
      <div className="text-lg leading-relaxed text-justify">
        <p>content</p>
      </div>
    </div>
  );
};

export default Article;
