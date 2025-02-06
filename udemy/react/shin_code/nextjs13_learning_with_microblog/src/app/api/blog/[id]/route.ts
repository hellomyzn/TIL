import { supabase } from "@/utils/supabaseClient";
import { NextApiRequest, NextApiResponse } from "next";
import { NextResponse } from "next/server";
import { notFound } from "next/navigation";

export async function GET(req: Request, res: NextApiResponse) {
  const id = req.url.split("/api/blog/")[1];

  const { data, error } = await supabase
    .from("posts")
    .select("*")
    .eq("id", id)
    .single();

  if (error) {
    return NextResponse.json(error);
  }
  if (!data) {
    notFound();
  }

  return NextResponse.json(
    { message: "success to get an article", article: data },
    { status: 200 }
  );
}

export async function DELETE(req: Request, res: NextApiResponse) {
  const id = req.url.split("/api/blog/")[1];

  const { error } = await supabase.from("posts").delete().eq("id", id);

  if (error) {
    return NextResponse.json(error);
  }

  return NextResponse.json(
    { message: "success to delete an article" },
    { status: 200 }
  );
}
