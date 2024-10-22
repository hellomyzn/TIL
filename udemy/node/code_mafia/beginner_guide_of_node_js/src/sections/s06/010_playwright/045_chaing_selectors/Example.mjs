import { chromium } from "@playwright/test";

// @see セレクターのチェーンの利用方法(>>)
// https://playwright.dev/docs/selectors#chaining-selectors

(async () => {
  const browser = await chromium.launch();
  const page = await browser.newPage();
  await page.goto("http://localhost:3000");

  // CSS セレクターで要素を取得
  const pageTitleLocator = await page.locator(
    ".cards.list-group-item >> nth=2"
  );
  const pageTitle = await pageTitleLocator.innerHTML();
  console.log(pageTitle);

  const parentLocator = await pageTitleLocator.locator("..");
  const parentTitle = await parentLocator.innerHTML();

  console.log(parentTitle);

  await browser.close();
})();
