import { chromium } from "@playwright/test";

(async () => {
  const browser = await chromium.launch();
  const page = await browser.newPage();
  await page.goto("http://localhost:3000");

  // css
  const pageTitleLocator = await page.locator(".navbar-brand");
  const pageTitle = await pageTitleLocator.innerText();
  console.log(pageTitle);

  // 文字列で要素を取得
  const textLocator = await page.locator("text=名刺管理アプリ");
  const pageText = await textLocator.innerText();
  console.log(pageText);

  // xpathで要素を取得 (xpathはclass,idがない時に使用する)
  const xpathLocator = await page.locator('xpath=//*[@id="__next"]/nav/div/a');
  const pageXpath = await xpathLocator.innerText();
  console.log(pageXpath);

  const htmlStr = await page.content();
  await browser.close();
})();
