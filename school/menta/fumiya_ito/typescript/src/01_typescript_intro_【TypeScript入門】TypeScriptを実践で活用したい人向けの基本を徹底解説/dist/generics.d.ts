declare function fun1(args: number): number;
declare function fun2(args: string): string;
declare function fun3<T>(args: T): T;
declare const fun4: <T>(args: T) => T;
declare let result: string;
declare let result2: number;
declare let result3: string;
declare let result4: number;
declare let result5: {
    name: string;
};
declare function funs<T, U>(arg1: T, arg2: U): [T, U];
declare let result6: [string, number];
interface User18 {
    name: string;
}
type User19 = {
    name: string;
};
declare let result7: User18;
interface KeyPair<T, U> {
    key: T;
    value: U;
}
declare const kv1: KeyPair<number, string>;
declare const kv2: KeyPair<number, number>;
declare const kv3: KeyPair<string, string[]>;
type KeyPair1<T, U> = {
    key: T;
    value: U;
};
declare const kv4: KeyPair1<number, string>;
declare const kv5: KeyPair1<number, number>;
declare const kv6: KeyPair1<string, string[]>;
