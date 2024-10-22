import { fileURLToPath } from "url";
import { dirname } from "path";

const __filename = fileURLToPath(import.meta.url);
const __dirname = dirname(__filename);

const __dirname2 = fileURLToPath(new URL(".", import.meta.url));
console.log(__filename);
console.log(__dirname);
console.log(__dirname2);

import { createRequire } from "module";
const require = createRequire(import.meta.url);
const jsonObj = require("./sample.json");
console.log(jsonObj);
