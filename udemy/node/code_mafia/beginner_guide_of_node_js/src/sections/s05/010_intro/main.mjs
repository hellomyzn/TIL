// import _ from "./lib/lodash.js";
import _ from "lodash";

const original = { prop: { nested: "value" } };
// オブジェクトの複製

const cloned = _.cloneDeep(original);
cloned.prop.nested = "new value";
console.log(original);
console.log(cloned);
