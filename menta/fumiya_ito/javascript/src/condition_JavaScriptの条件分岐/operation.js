// 論理積（&&）
// 左から順番に値を確認（評価）し、値が偽値（false）であった場合は他の値を確認（評価）せずに、偽値（false）であった値を返します。
// すべての値が真値（true）であった場合は最後の値を返します。

// 例1: 値がともに真値である場合
var score = 20
var value = score < 100 && 0 < score 
console.log(value)  // true と出力

// 例2: 最初の値が偽値である場合
var score = null
var value = score && score === null
console.log(value)  // null と出力

// 例3: 3つの値の途中で偽値がある場合
var value = 1 && null && 'hoge'
console.log(value)  // null と出力

var value = true && true
console.log(value)  // null と出力

var value = true && 'false' && 5
console.log(value)


// 論理和（||）演算子は、左から右に値を評価し、最初の真と評価される値を返します。もし全て偽と評価される場合、最後の値を返します。
// 偽と評価される値
// - false：論理的な偽
// - 0：数値のゼロ
// - ""または''：空の文字列
// - null：何もない、空の値
// - undefined：値が未定義
// - NaN：数値ではない（Not a Number）

// 真と評価される値
// 偽と評価される値以外は基本的に真と評価されます。例えば以下の値です。
// - 任意のゼロでない数値（1、-1、100など）
// - 空でない文字列（"hello"、'world'など）
// - 空でないオブジェクト（{}、[]を含む）

// 例1 途中に真と評価される値がある場合
var value = 0 || 'Good' || null
console.log(value) // 最初に真と評価されるGoodが出力される
const greeting = 'Hello' || Hey
console.log(greeting) // 最初に真と評価されるHelloが出力される

// 例2 全て偽と評価される場合
var value = 0 || undefined
console.log(value) // 最後に偽と評価されるundefinedが出力される
const falsyValues = false || 0 || ''
console.log(falsyValues) // 最後に偽と評価される''が出力される`


// 論理否定（!）
// 任意の値の先頭に!を記述して使用します。
// 対象の値が真偽値（trueまたはfalse）の場合は、反転した値を返します。
// 対象の値が真偽値でない場合は、その値を真値（true）に変換できるなら偽値（false）を返し、それ以外は真値を返します。

// 例1 対象の値が真偽値の場合
console.log(!true) // false と出力
console.log(!false) // true と出力

// 例2 対象の値が真偽値でない場合
console.log(!'hoge') // false と出力
console.log(!undefined) // true と出力


// 比較演算子(JavaScript)
// 比較演算子は左辺と右辺を比較するときに使用します。trueまたはfalseを返します。
// 演算子       説明
// ==          等価
// ===         厳密な等価（値の型まで比較）
// !=          不等価
// !==	       厳密な不等価（値の型まで比較）
// <           小なり（左辺の値が右辺の値より小さいこととを判定）
// >	       大なり（左辺の値が右辺の値より大きいことを判定）
// <=	       以下なり（左辺の値が右辺の値以下であることを判定）
// >=	       以上なり（左辺の値が右辺の値以上であることを判定）

console.log(3 === '3') // false と出力
console.log(3 == '3') // true と出力
console.log(1 == 1 ) // true と出力
console.log(1 != 2) // true と出力
console.log(1 != '1') // false と出力
console.log(1 !== '1') // true と出力
console.log(4 > 3) // true と出力
console.log(3 >= 3) // true と出力


// 等価演算子（==）
// 等価演算子は、左辺と右辺を比較し「同じ値」であるかを判定するために使用されます。

// 演算子	説明
// ==	   左辺と右辺が「同じ値」である
// !=      左辺と右辺が「同じ値」ではない

// 例1 数値の1と文字列の'1'を比較します
var value = 1 == '1' 
console.log(value) // true と出力


// 厳密等価演算子（===）
// 厳密等価演算子は、左辺と右辺を比較し「同じ値」かつ「同じ型」であるかを判定するために使用します。

// 演算子	説明
//         ===	左辺と右辺が「同じ値」かつ「同じ型」である
//         !==	左辺と右辺が「同じ値」ではないか「同じ型」ではない

// 例1 数値の10を比較します
var value = 10 === 10
console.log(value) // true と出力

// 例2 数値の10と文字列の'10'を比較します
var value = 10 === '10'
console.log(value) // false と出力