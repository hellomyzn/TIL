import { PrismaClient } from "@prisma/client";
import { NextResponse } from "next/server";

const prisma = new PrismaClient();
export async function main() {
  try {
    await prisma.$connect();
  } catch (err) {
    return Error("DB error was occurred");
  }
}
export const GET = async (req: Request, res: NextResponse) => {
  // localhost:3000/api/blog/1
  try {
    const id: number = parseInt(req.url.split("blog/")[1]);

    await main();
    const post = await prisma.post.findFirst({ where: { id } });
    return NextResponse.json({ message: "Success", post }, { status: 200 });
  } catch (err) {
    return NextResponse.json({ message: "Error: ", err }, { status: 500 });
  } finally {
    await prisma.$disconnect();
  }
};

export const PUT = async (req: Request, res: NextResponse) => {
  // localhost:3000/api/blog/1
  try {
    const id: number = parseInt(req.url.split("blog/")[1]);
    const { title, description } = await req.json();

    await main();
    const post = await prisma.post.update({
      where: { id },
      data: { title, description },
    });
    return NextResponse.json({ message: "Success", post }, { status: 201 });
  } catch (err) {
    return NextResponse.json({ message: "Error: ", err }, { status: 500 });
  } finally {
    await prisma.$disconnect();
  }
};

export const DELETE = async (req: Request, res: NextResponse) => {
  // localhost:3000/api/blog/1
  try {
    const id: number = parseInt(req.url.split("blog/")[1]);

    await main();
    const post = await prisma.post.delete({
      where: { id },
    });
    return NextResponse.json({ message: "Success", post }, { status: 201 });
  } catch (err) {
    return NextResponse.json({ message: "Error: ", err }, { status: 500 });
  } finally {
    await prisma.$disconnect();
  }
};
