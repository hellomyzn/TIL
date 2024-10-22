// CJSとESM間のモジュール連携
// OK: CJS -> ESM
// NG: ESM -> CJS

import { plus } from "./calc.cjs";
console.log(plus(1, 3));
