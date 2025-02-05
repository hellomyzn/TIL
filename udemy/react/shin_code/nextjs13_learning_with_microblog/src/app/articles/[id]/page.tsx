import React from "react";
import Image from "next/image";
import { getDetailArticle } from "@/blogAPI";

const Article = async ({ params }: { params: { id: string } }) => {
  const detailArticle = await getDetailArticle(params.id);
  console.log(detailArticle);
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
