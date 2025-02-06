import { supabase } from "@/utils/supabaseClient";
import { NextApiRequest, NextApiResponse } from "next";
import { NextResponse } from "next/server";

export async function GET(req: Request, res: NextApiResponse) {
  const { data, error } = await supabase.from("posts").select("*");
  if (error) {
    return NextResponse.json(error);
  }

  return NextResponse.json(
    { message: "success to get all articles", articles: data },
    { status: 200 }
  );
}

export async function POST(req: Request, res: NextApiResponse) {
  const { id, title, content } = await req.json();
  const createdAt = new Date().toISOString();

  const { data, error } = await supabase
    .from("posts")
    .insert([{ id, title, content, createdAt }]);

  if (error) {
    return NextResponse.json(error);
  }

  return NextResponse.json(
    { message: "success to post a article", articles: data },
    { status: 201 }
  );
}
