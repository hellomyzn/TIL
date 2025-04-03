// 文字列操作/連結, split
// 文字列の連結は加算演算子でできる。
// splitメソッドで文字列を分離できる（配列になる）
// splitで分離した文字列は配列になるので、配列のjoinメソッドで結合できる。

var message = "Hello" + "World";
console.log(message); // HelloWorld

var string = "A,B,C";
var units = string.split(","); // splitで分離
console.log(units); //  ["A", "B", "C"]

var string2 = units.join(" - "); // joinで再び結合
console.log(string2); // "A - B - C"

// 文字列操作/trim
// trimメソッドを使用した文字列に対して、文字列の両端の空白を削除します
// 文字列.trim()

// 例1 文字列' ABC DEFG 'から文字列の両端の空白を削除します
var word = "  ABCDEFG         ";
console.log(word.trim()); // 'ABCDEFG'

// 例2 文字列' ABC DE FG 'から文字列の両端の空白を削除します
var word = "  ABC   DE   FG         ";
console.log(word.trim()); // 'ABC   DE   FG'

// 配列操作 / join
// joinメソッドを呼び出した配列の要素を文字列として結合します

// 例1 配列['Hello', 'World']の要素を区切り文字','で結合して、「'Hello,World'」という文字列を作成します
console.log(["Hello", "World"].join()); // 'Hello,World'

// 例2 配列['Hello', 'World']の要素を区切り文字'/'で結合して、「'Hello/World'」という文字列を作成します
console.log(["Hello", "World"].join("/")); // 'Hello/World'

// 文字列操作/substring
// substringメソッドを使用した文字列に対して、指定した位置から文字列を切り出す
// 開始位置だけを指定した場合は、末尾までの文字列を切り出します
// 開始位置と終了位置を指定した場合は、終了位置の文字列の手前までを切り出します
// 文字列.substring([開始位置], [終了位置])

// 例1 文字列'ABCDEFG'から'DEFG'を切り出して取得する
var word = "ABCDEFG";
console.log(word.substring(3)); // 'DEFG'

// 例2 文字列'ABCDEFG'から'BC'を切り出して取得する
var word = "ABCDEFG";
console.log(word.substring(1, 3)); // 'BC'

// 文字列操作/indexOf
// indexOfメソッドを呼び出した文字列の中から特定の文字列を探してindexを返す

// 例1 文字列'あいうえお'から'え'を探してindexを返す
var words = "あいうえお";
console.log(words.indexOf("え")); // 3

// 例2 文字列'あいうえお'から'か'を探してindexを返す
var words = "あいうえお";
console.log(words.indexOf("か")); // -1

// 文字列操作/includes
// includesメソッドを呼び出した文字列に特定の文字列が存在しているか確認して、trueかfalseで返す

// 例1 文字列'あいうえお'から'え'を探してtrueを返す
var words = "あいうえお";
console.log(words.includes("え")); // true

// 例2 文字列'あいうえお'から'か'を探してfalseを返す
var words = "あいうえお";
console.log(words.includes("か")); // false

// 正規表現リテラル
// 正規表現リテラルを用いて、正規表現を利用することができます。

// 2桁の数字を表す正規表現
var regexp = /[0-9]{2}/;
// ひらがなもしくは小文字のアルファベット3文字から4文字を表す正規表現
var regexp2 = /[ぁ-んa-z]{3,4}/;
// 090-1234-5678のような携帯の電話番号を表す正規表現
var regexp3 = /[0-9]{3}-[0-9]{4}-[0-9]{4}/;
// 2つの小文字のアルファベットからなる文字列をグローバルに検索する正規表現
var regexp4 = /[a-z]{2}/g;

// 例1 文字列'20'が正規表現[0-9]{2}に合致するかを返す
var sampleRegexp = /[0-9]{2}/;
var word = "20";
console.log(sampleRegexp.test(word)); // true

// 文字列操作/test
// testメソッドを呼び出した正規表現が、指定した文字列に含まれているかどうかを取得します
// 正規表現.test([検索する文字列])

// 例1 正規表現/[0-9]{4}/が、文字列'1234'に含まれているかどうかを取得します
var sampleNumber = "1234";

// 4桁の数字を表す正規表現
var regexp = /[0-9]{4}/;
console.log(regexp.test(sampleNumber)); // true

// 例2 正規表現/[ぁ-ん]{3}/が、文字列'abcあいう'に含まれているかどうかを取得します
var samplePassword = "abcあいう";
// 3つの連続するひらがなを表す正規表現
var regexp = /[ぁ-ん]{3}/;
console.log(regexp.test(samplePassword)); // true

// 正規表現オブジェクト
// 正規表現オブジェクトを用いて、正規表現を利用することができます。
// 2桁の数字を表す正規表現
var regexp = new RegExp("[0-9]{2}");
// ひらがなもしくは小文字のアルファベット3文字から4文字を表す正規表現
var regexp2 = new RegExp("[ぁ-んa-z]{3,4}");
// 090-1234-5678のような携帯の電話番号を表す正規表現
var regexp3 = new RegExp("[0-9]{3}-[0-9]{4}-[0-9]{4}");
// 2つの小文字のアルファベットからなる文字列をグローバルに検索する正規表現
var regexp4 = new RegExp("[a-z]{2}", "g");

// 例1 文字列'20'が正規表現[0-9]{2}に合致するかを返す
var sampleRegexp = new RegExp("[0-9]{2}");
var word = "20";
console.log(sampleRegexp.test(word)); // true

// 文字列操作/search
// searchメソッドを呼び出した文字列の中から、最初にマッチした文字列のインデックス番号を取得します
// 文字列.search([検索する文字列])

// 例1 文字列'abcあいう'の中から、正規表現/[ぁ-ん]/にマッチした文字列のインデックス番号を取得します

var samplePassword = "abcあいう";
// ひらがなを表す正規表現
var regexp = /[ぁ-ん]/;
console.log(samplePassword.search(regexp)); // 3

// 文字列操作/match
// matchメソッドを呼び出した文字列の中から、マッチした文字列を配列で取得します
// 正規表現にgフラグがなければ、最初に一致した文字の配列を返します。
// 正規表現にgフラグがあれば、一致したすべての文字の配列を返します。
// 文字列.match([検索する文字列])

// 例1 文字列'abcあいう'の中から、正規表現/[ぁ-ん]/にマッチした文字列を配列で取得します
var sampleText = "abcあいう";
var regexp = /[ぁ-ん]/;
console.log(sampleText.match(regexp)); // ['あ']

// 例2 文字列'abcあいう'の中から、正規表現/[ぁ-ん]/gにマッチした文字列を配列で取得します
var sampleText = "abcあいう";
var regexp = /[ぁ-ん]/g;
console.log(sampleText.match(regexp)); // ['あ', 'い', 'う']

// 文字列操作/replace
// replaceメソッドを呼び出した文字列の中から、最初にマッチした文字列を置換します
// 文字列.replace([置き換えたい文字列], [置き換え後の文字列])

// 例1 文字列'AABCD'の中から、最初にマッチした'A'を'Z'に置換します
var word = "AABCD";
console.log(word.replace("A", "Z")); // 'ZABCD'

// 例2 文字列'abcあいう'の中から、正規表現/[a-z]/に最初にマッチした文字を'1'に置換します
var word = "abcあいう";
var regexp = /[a-z]/;
console.log(word.replace(regexp, "1")); // '1bcあいう'

// 文字列操作/replaceAll
// replaceAllメソッドを呼び出した文字列の中から、マッチした文字列をすべて置換します
// また正規表現を用いる際に、gフラグを指定していなければエラーになります
// 文字列.replaceAll([置き換えたい文字列], [置き換え後の文字列])

// 例1 文字列'AABCD'の中から、'A'をすべて'Z'に置換します
var word = "AABCD";
console.log(word.replaceAll("A", "Z")); // "ZZBCD"

// 例2 文字列'abcあいう'の中から、正規表現/[a-z]/gにマッチした文字をすべて'1'に置換します
var word = "abcあいう";
var regexp = /[a-z]/g;
console.log(word.replaceAll(regexp, "1")); // '111あいう'
