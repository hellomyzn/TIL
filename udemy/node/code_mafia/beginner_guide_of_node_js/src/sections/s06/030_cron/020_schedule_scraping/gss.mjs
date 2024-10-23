import { GoogleSpreadsheet } from "google-spreadsheet";
import env from "dotenv";
env.config();

import { createRequire } from "module";

const require = createRequire(import.meta.url);
const secrets = require("../../020_google_sheet/google_secrets.json");

import { getEmployeeByScraping } from "./scraping.mjs";

async function addEmployeesToGSS() {
  const doc = new GoogleSpreadsheet(process.env.GOOGLE_SHEET_ID);

  await doc.useServiceAccountAuth({
    client_email: secrets.client_email,
    private_key: secrets.private_key,
  });

  await doc.loadInfo();

  const employees = await getEmployeeByScraping();

  const sheet = doc.sheetsByTitle["scraping"];
  const rows = await sheet.addRows(employees);
}
export { addEmployeesToGSS };
