import { addEmployeesToGSS } from "./gss.mjs";
import cron from "node-cron";

cron.schedule("37 07 * * *", () => {
  addEmployeesToGSS();
});
