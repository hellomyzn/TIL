// import _ from "./lib/lodash.js";
// import _ from "lodash";
import cloneDeep from "lodash/cloneDeep.js";

const original = { prop: { nested: "value" } };
// オブジェクトの複製

// const cloned = _.cloneDeep(original);
const cloned = cloneDeep(original);
cloned.prop.nested = "new value";
console.log(original);
console.log(cloned);
