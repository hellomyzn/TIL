import { PrismaClient } from "@prisma/client";

const prisma = new PrismaClient();

async function main() {
  const newUser = await prisma.user.create({
    data: {
      email: "hoge@hoge.com",
      name: "hoge",
    },
  });
  console.log("new user: ", newUser);

  const user = await prisma.user.findUnique({
    where: {
      email: "hoge@hoge.com",
    },
  });
  console.log("find user: ", user);

  const updatedUser = await prisma.user.update({
    where: {
      email: "hoge@hoge.com",
    },
    data: {
      name: "fuga",
    },
  });
  console.log("updated user: ", updatedUser);

  const deletedUser = await prisma.user.delete({
    where: {
      email: "hoge@hoge.com",
    },
  });
  console.log("deleted user: ", deletedUser);

  const newUserWithPost = await prisma.user.create({
    data: {
      email: "fuga@fuga.com",
      name: "fuga",
      posts: {
        create: {
          title: "fuga title",
          content: "fugafugafuga",
        },
      },
    },
  });
  console.log("create new user with post: ", newUserWithPost);

  const userWithPost = await prisma.user.findUnique({
    where: { id: newUserWithPost.id },
    include: { posts: true },
  });

  console.log("find user with posts: ", userWithPost);

  const deletedPost = await prisma.post.deleteMany({
    where: {
      authorId: newUserWithPost.id,
    },
  });
  console.log("delete post", deletedPost);

  const deletedNewUserWithPost = await prisma.user.delete({
    where: {
      id: newUserWithPost.id,
    },
  });
  console.log("delete new user with post", deletedNewUserWithPost);
}

main()
  .catch((e) => {
    console.log("Error: ", e);
    process.exit(1);
  })
  .finally(async () => {
    await prisma.$disconnect();
  });
