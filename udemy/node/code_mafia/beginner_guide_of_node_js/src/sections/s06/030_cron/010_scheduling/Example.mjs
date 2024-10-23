import cron from "node-cron";

cron.schedule("* * * * * *", () => console.log("every sec"));
cron.schedule("*/3 * * * * *", () => console.log("every 3secs"));
cron.schedule("* * * * *", () => console.log("every min"));
cron.schedule("0 0 9,18 * *", () => console.log("every day at 9am, 6pm"));
cron.schedule("30 30 12 * * *", () => console.log("every day at 12:30:30"));
