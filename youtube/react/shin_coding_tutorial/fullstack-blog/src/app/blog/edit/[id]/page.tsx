"use client";
import { PathParamsContext } from "next/dist/shared/lib/hooks-client-context.shared-runtime";
import { useRouter } from "next/navigation";
import React from "react";
import { useRef, useEffect } from "react";
import { Toaster, toast } from "react-hot-toast";

const editBlog = async (
  title: string | undefined,
  description: string | undefined,
  id: number
) => {
  const res = await fetch(`http://localhost:3000/api/blog/${id}`, {
    method: "PUT",
    headers: {
      "Content-Type": "application/json",
    },
    body: JSON.stringify({ title, description, id }),
  });

  return res.json();
};

const getBlogById = async (id: number) => {
  const res = await fetch(`http://localhost:3000/api/blog/${id}`);
  const data = await res.json();
  return data.post;
};

const deleteBlog = async (id: number) => {
  const res = await fetch(`http://localhost:3000/api/blog/${id}`, {
    method: "DELETE",
  });

  return res.json();
};

const EditPost = ({ params }: { params: { id: number } }) => {
  const router = useRouter();
  const titleRef = useRef<HTMLInputElement | null>(null);
  const descRef = useRef<HTMLTextAreaElement | null>(null);

  useEffect(() => {
    getBlogById(params.id)
      .then((data) => {
        if (titleRef.current) {
          titleRef.current.value = data.title;
        }
        if (descRef.current) {
          descRef.current.value = data.description;
        }
      })
      .catch((err) => {
        toast.error("error is occured", { id: "1" });
      });
  }, []);
  const handleSubmit = async (e: React.FormEvent) => {
    // prevent reload
    e.preventDefault();

    toast.loading("editing...", { id: "2" });
    await editBlog(titleRef.current?.value, descRef.current?.value, params.id);

    toast.success("edited", { id: "2" });
    router.push(`/blog/edit/${params.id}`);
    router.refresh();
  };

  const handleDelete = async (e: React.FormEvent) => {
    // prevent reload
    e.preventDefault();

    toast.loading("deleting...", { id: "3" });
    await deleteBlog(params.id);
    router.push("/");
    router.refresh();
  };
  return (
    <>
      <Toaster />
      <div className="w-full m-auto flex my-4">
        <div className="flex flex-col justify-center items-center m-auto">
          <p className="text-2xl text-slate-200 font-bold p-3">
            ブログの編集 🚀
          </p>
          <form className="text-black">
            <input
              value={titleRef.current?.value}
              ref={titleRef}
              placeholder="タイトルを入力"
              type="text"
              className="rounded-md px-4 w-full py-2 my-2"
            />
            <textarea
              value={descRef.current?.value}
              ref={descRef}
              placeholder="記事詳細を入力"
              className="rounded-md px-4 py-2 w-full my-2"
            ></textarea>
            <button
              onClick={handleSubmit}
              className="font-semibold px-4 py-2 shadow-xl bg-slate-200 rounded-lg m-auto hover:bg-slate-100"
            >
              更新
            </button>
            <button
              onClick={handleDelete}
              className="ml-2 font-semibold px-4 py-2 shadow-xl bg-red-400 rounded-lg m-auto hover:bg-slate-100"
            >
              削除
            </button>
          </form>
        </div>
      </div>
    </>
  );
};

export default EditPost;
