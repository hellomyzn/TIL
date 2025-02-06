import { supabase } from "@/utils/supabaseClient";
import { NextApiRequest, NextApiResponse } from "next";
import { notFound } from "next/navigation";

export default async function handler(
  req: NextApiRequest,
  res: NextApiResponse
) {
  const { id, title, content } = req.body;
  const createdAt = new Date().toISOString();
  const { data, error } = await supabase
    .from("posts")
    .insert([{ id, title, content, createdAt }]);

  if (error) {
    return res.status(500).json({ error: error.message });
  }

  return res.status(200).json(data);
}
