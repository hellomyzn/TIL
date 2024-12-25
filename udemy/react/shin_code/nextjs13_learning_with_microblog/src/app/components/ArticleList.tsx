import Image from "next/image";
import Link from "next/link";
import React from "react";

const ArticleList = () => {
  const article = {
    id: 2,
  };
  return (
    <div>
      <article className="shadow my-4 flex flex-col">
        <Link href="#" className="hover:opacity-75">
          <Image
            src={`https://picsum.photos/1000/500?sig=${article.id}`}
            alt=""
            width={1280}
            height={30}
          />
        </Link>
        <div className="bg-white flex flex-col justify-start p-6">
          <Link href="#" className="text-blue-700 pb-4 font-bold">
            Technology
          </Link>
          <Link
            href="#"
            className="text-slate-900 text-3xl font-bold hover:text-gray-700 pb-4"
          >
            Title
          </Link>
          <p className="text-sm pb-3 text-slate-900">
            {" "}
            By the person, published on 12/31, 2024
          </p>
          <Link href="#" className="text-slate-900 pb-6">
            Lorem ipsum dolor sit amet consectetur adipisicing elit. Dolorem
            eius odio, velit nostrum cum facilis corrupti et eligendi voluptatum
            sed exercitationem impedit non numquam, nesciunt, perspiciatis sequi
            accusantium quo nemo?
          </Link>
          <Link href="#" className="text-pink-800 hover:text-black">
            read more
          </Link>
        </div>
      </article>
      <article className="shadow my-4 flex flex-col">
        <Link href="#" className="hover:opacity-75">
          <Image
            src={`https://picsum.photos/1000/500?sig=${article.id + 1}`}
            alt=""
            width={1280}
            height={30}
          />
        </Link>
        <div className="bg-white flex flex-col justify-start p-6">
          <Link href="#" className="text-blue-700 pb-4 font-bold">
            Technology
          </Link>
          <Link
            href="#"
            className="text-slate-900 text-3xl font-bold hover:text-gray-700 pb-4"
          >
            Title
          </Link>
          <p className="text-sm pb-3 text-slate-900">
            {" "}
            By the person, published on 12/31, 2024
          </p>
          <Link href="#" className="text-slate-900 pb-6">
            Lorem ipsum dolor sit amet consectetur adipisicing elit. Dolorem
            eius odio, velit nostrum cum facilis corrupti et eligendi voluptatum
            sed exercitationem impedit non numquam, nesciunt, perspiciatis sequi
            accusantium quo nemo?
          </Link>
          <Link href="#" className="text-pink-800 hover:text-black">
            read more
          </Link>
        </div>
      </article>
    </div>
  );
};

export default ArticleList;
