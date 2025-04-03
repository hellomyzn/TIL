
// if文の省略記法
// if文では、処理が１つである場合は{}を省略して書くことができます。if文の評価する条件式が真である場合に実行する処理を書きます。
// 省略記法を使用することで、複雑な条件分岐を短く記述できて、可読性が高くなります。
// if (条件式) 実行する処理

// 例1 オンラインゲームでレベルアップの処理を行う場合
const level = 10

// このコードは、変数levelが10以上であれば、コンソールに'レベルが10以上です'と表示します。
if (level >= 10) console.log('レベルが10以上です')

// 例2 入力フォームでの入力チェックを行う場合
const inputText = 'Hello World'
// このコードは、変数inputTextの値が空である場合に、アラートで「何か入力してください」と表示します。
if (!inputText) alert('何か入力してください')

// 三項演算子
// 条件に当てはまるかどうかを判定して、条件式が真（true）の時はコロンの前の式、偽（false）の時はコロンの後の式を選択します。
// 条件式 ? 条件式が真の時の式 : 条件式が偽の時の式

// 例1 購入できるかどうか判定する
const budget = 10000
const itemPrice = 8000
// このコードでは、変数budgetの値が変数itemPriceの値よりも大きいため、変数purchaseStatusには'購入できます'が代入されます。
const purchaseStatus = budget > itemPrice ? '購入できます' : '予算オーバーです' 
console.log(purchaseStatus)

// 例2 成人かどうか判定する
var age = 10
// このコードでは、変数ageの値が10であるため、変数messageには'未成年です'が代入されます。
const message = age >= 18 ? '成人です' : '未成年です'
console.log(message)

// 例3 if文を使った条件分岐を、三項演算子を使った条件分岐に書き換える
var age = 22

// 三項演算子を使わない場合
if (age >= 20) {
  console.log('私は20歳以上です')
} else {
  console.log('私は20歳未満です')
}

// 三項演算子を使う場合
console.log(age >= 20 ? '私は20歳以上です' : '私は20歳未満です')