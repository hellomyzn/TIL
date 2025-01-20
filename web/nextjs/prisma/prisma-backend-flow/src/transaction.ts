import { Prisma, PrismaClient } from "@prisma/client";

const prisma = new PrismaClient();

async function createPostWithTransaction() {
  try {
    const num = Math.floor(Math.random() * 100) + 1;
    await prisma.$transaction(async (prisma) => {
      const user = await prisma.user.create({
        data: {
          email: `email_${num}@mail.com`,
          name: "name",
        },
      });

      await prisma.post.create({
        data: {
          title: "title",
          content: "content",
          authorId: user.id,
        },
      });

      await prisma.user.update({
        where: { id: user.id },
        data: {
          name: "updated name",
        },
      });
    });
  } catch (e) {
    console.error(e);
  }
}

createPostWithTransaction()
  .catch((e) => {
    console.error("error: ", e);
    process.exit(1);
  })
  .finally(async () => {
    await prisma.$disconnect();
  });
