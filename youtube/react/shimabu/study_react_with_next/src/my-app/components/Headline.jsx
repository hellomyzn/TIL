import Image from "next/image";

export function Headline({ title, page }) {
  return (
    <>
      <Image
        className="dark:invert"
        src="/next.svg"
        alt="Next.js logo"
        width={180}
        height={38}
        priority
      />
      <h1>{title}</h1>
      <ol className="list-inside list-decimal text-sm text-center sm:text-left font-[family-name:var(--font-geist-mono)]">
        <li className="mb-2">
          Get started by editing{" "}
          <code className="bg-black/[.05] dark:bg-white/[.06] px-1 py-0.5 rounded font-semibold">
            {page}
          </code>
          .
        </li>
        <li>Save and see your changes instantly.</li>
      </ol>
    </>
  );
}
