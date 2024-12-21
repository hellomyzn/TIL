import { Footer } from "@components/Footer";
import { Links } from "@components/Links";
import { Headline } from "@components/Headline";

export default function About() {
  return (
    <div className="grid grid-rows-[20px_1fr_20px] items-center justify-items-center min-h-screen p-8 pb-20 gap-16 sm:p-20 font-[family-name:var(--font-geist-sans)]">
      <main className="flex flex-col gap-8 row-start-2 items-center sm:items-start">
        <Headline title="About Page" page="app/about/page.js" />
        <Links />
      </main>
      <Footer />
    </div>
  );
}
