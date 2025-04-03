var __extends = (this && this.__extends) || (function () {
    var extendStatics = function (d, b) {
        extendStatics = Object.setPrototypeOf ||
            ({ __proto__: [] } instanceof Array && function (d, b) { d.__proto__ = b; }) ||
            function (d, b) { for (var p in b) if (Object.prototype.hasOwnProperty.call(b, p)) d[p] = b[p]; };
        return extendStatics(d, b);
    };
    return function (d, b) {
        if (typeof b !== "function" && b !== null)
            throw new TypeError("Class extends value " + String(b) + " is not a constructor or null");
        extendStatics(d, b);
        function __() { this.constructor = d; }
        d.prototype = b === null ? Object.create(b) : (__.prototype = b.prototype, new __());
    };
})();
var nums = [1, null, "Hello"];
var userWithPosts = {
    id: "aaa",
    name: "bob",
    posts: [
        {
            id: "aaa",
            title: "hoge",
            content: "fuga",
        },
        {
            id: "bbb",
            title: "hoge2",
            content: "fuga2",
        },
    ],
};
var postWithComments = {
    id: "aaa",
    title: "testPost",
    index: 1,
    comments: [
        {
            id: "aaa",
            title: "hoge",
            content: "fuga",
            wordCount: 4,
        },
        {
            id: "bbb",
            title: "hoge2",
            content: "fuga2",
            wordCount: 4,
        },
    ],
};
// 型定義応用4
// 型定義応用5
// オブジェクトのkeyをユニオン型に変換
var user3 = { id: 3, name: "bob" };
// オブジェクトのvalueをユニオン型に変換
var user4 = { id: 3, name: "bob" };
// 配列からユニオン型変換
var fruits = ["apple", "orange", "lemon"];
var printLearningLanguage = function (lang) {
    switch (lang) {
        case "JavaScript":
            console.log("I'm learning ".concat(lang));
            break;
        case "TypeScript":
            console.log("I'm learning ".concat(lang));
            break;
        case "React":
            console.log("I'm learning ".concat(lang));
            break;
        case "Go":
            console.log("I'm learning ".concat(lang));
            break;
        default:
            var neverValue = lang;
            throw new Error("".concat(lang, "\u306F\u30AB\u30EA\u30AD\u30E5\u30E9\u30E0\u306B\u306A\u3044\u8A00\u8A9E\u3067\u3059"));
    }
};
// never型の活用2
var ExhaustiveError = /** @class */ (function (_super) {
    __extends(ExhaustiveError, _super);
    function ExhaustiveError(value, message) {
        if (message === void 0) { message = "".concat(value, "\u306F\u30AB\u30EA\u30AD\u30E5\u30E9\u30E0\u306B\u306A\u3044\u8A00\u8A9E\u3067\u3059"); }
        return _super.call(this, message) || this;
    }
    return ExhaustiveError;
}(Error));
var printLearningLanguage1 = function (lang) {
    switch (lang) {
        case "JavaScript":
            console.log("I'm learnig ".concat(lang));
            break;
        case "TypeScript":
            console.log("I'm learnig ".concat(lang));
            break;
        case "React":
            console.log("I'm learnig ".concat(lang));
            break;
        case "Go":
            console.log("I'm learnig ".concat(lang));
            break;
        default:
            throw new ExhaustiveError(lang);
    }
};
printLearningLanguage1("Go");
// 型ガード（typeof）
var func1 = function (x) {
    if (typeof x === "string") {
        console.log(x.length);
    }
    if (typeof x === "number") {
        console.log(x.toString());
    }
};
var func2 = function (x) {
    if (typeof x === "number") {
        console.log(x.toString());
    }
    if (typeof x === "object") {
        console.log(x.map(function (x) { return x * 2; }));
    }
};
var getEmail = function (person) {
    if ("email" in person) {
        return person.email;
    }
    else {
        return undefined;
    }
};
var res = function (res) {
    if ("isSuccess" in res) {
        if (res.isSuccess === true) {
            console.log(res.message);
        }
        else {
            console.log(res.error);
        }
    }
};
// 型ガードエラーハンドリング(typeof)
// const func = async () => {
//   try {
//     await fetch("http://a.com");
//   } catch (error) {
//     if (typeof error === "object") {
//       console.log(error);
//     }
//   }
// };
// 型ガードエラーハンドリング(instanceof)
// const func = async () => {
//   try {
//     await fetch("http://a.com");
//   } catch (error) {
//     if (error instanceof Error) {
//       console.log(error.message);
//     }
//   }
// };
// 型ガードエラーハンドリング(instanceof / extends)
// class HttpError extends Error {
//   //ここにclassを作ってください
//   status?: number;
// }
// const func = async () => {
//   try {
//     await fetch("http://a.com");
//   } catch (error) {
//     if (error instanceof HttpError) {
//       if (error.status === 404) {
//         console.log(error.status);
//       }
//     }
//   }
// };
// 型ガードHTTPエラーハンドリング(in)
// class HttpError extends Error {
//   //ここにclassを作ってください
//   status?: number;
// }
// const func = async () => {
//   try {
//     await fetch("http://a.com");
//   } catch (error) {
//     if (error instanceof HttpError) {
//       if ("status" in error) {
//         console.log(error.status);
//       }
//     }
//   }
// };
// 型ガード(is)
var getString = function (x) {
    return typeof x === "string";
};
var func = function (x) {
    if (getString(x)) {
        return x;
    }
    else {
        return "";
    }
};
// Index型（Index signature）
var stringNumberObject;
stringNumberObject = { age: 36 }; //ok
stringNumberObject.age = 36; //ok
stringNumberObject["age"] = 36; //ok
// stringNumberObject["age"] = "36" //error
// Record
var stringNumberObject1;
stringNumberObject1 = { age: 36 }; //ok
stringNumberObject1.age = 36; //ok
stringNumberObject1["age"] = 36; //ok
var data1 = {
    id: 1,
    payload: 2,
};
var data2 = {
    id: 1,
    payload: "hoge",
};
var data3 = {
    id: 1,
    payload: {
        name: "bob",
    },
};
var data4 = {
    id: 1,
    message: "hoge",
};
var data5 = {
    id: 2,
    message: ["foo", "bar"],
};
// ジェネリクス関数
function func5(x) {
    return x;
}
var str = func5("a");
var num = func5(1);
var getAge = function (person) {
    return person.age;
};
