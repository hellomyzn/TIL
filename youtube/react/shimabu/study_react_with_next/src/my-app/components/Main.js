import { Links } from "@components/Links";
import { Headline } from "@components/Headline";

export function Main({ title, page }) {
  return (
    <main className="flex flex-col gap-8 row-start-2 items-center sm:items-start">
      <Headline title={title} page={page} />
      <Links />
    </main>
  );
}
