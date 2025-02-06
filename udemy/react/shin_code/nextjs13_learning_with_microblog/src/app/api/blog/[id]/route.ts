import { supabase } from "@/utils/supabaseClient";
import { NextApiRequest, NextApiResponse } from "next";
import { NextResponse } from "next/server";
import { notFound } from "next/navigation";

export async function GET(req: Request, res: NextApiResponse) {
  const id = req.url.split("/api/")[1];

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
    { message: "success", articles: data },
    { status: 200 }
  );
}
