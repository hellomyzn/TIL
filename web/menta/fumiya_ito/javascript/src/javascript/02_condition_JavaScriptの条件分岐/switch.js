// switch文とbreak文
// switch文では、以下のような流れで処理が実行されます。
// 1. 式の結果（値）と一致する値のあるcase節を上から順に探す
// 2. １で該当するcase節の処理が実行される
// 3. ２のcase節にbreakがあれば終了する
// 4. ２のcase節にbreakがない場合はbreakのあるcase節の処理まで続いて実行される
// 5. breakが全くない場合は最後まで処理が続いて実行される
// そのため、条件ごとに処理を区別する場合は breakの記載を忘れないように注意してください。

// switch (式) {
//   case value1:
//     式の結果が value1 に一致する場合に実行する処理
//     break
//   case value2:
//     式の結果が value2 に一致する場合に実行する処理
//     break
//   default:
//     式の結果一致する値がない場合に実行する処理
// }

// 例1 breakを記述しない処理の挙動
var x = 1
// 「xは1です」、「xは2です」、「xは3です」、「xは不正な値です」と出力
switch (x) {
  case 1:
    console.log('xは1です')
  case 2:
    console.log('xは2です')
  case 3:
    console.log('xは3です')
  default:
    console.log('xは不正な値です')
}

// 例2 breakを記述した処理の挙動
var x = 1
//  「xは1です」と出力
switch (x) {
  case 1:
    console.log('xは1です')
      break
  case 2:
    console.log('xは2です')
      break
  case 3:
    console.log('xは3です')
      break
  default:
    console.log('xは不正な値です')
}


// switch文とdefault節
// switch文のdefault節は、式の結果（値）が各case節のどの値にも一致しなかった場合に処理が実行されます。また、基本的にdefault節ではbreak文の記載は不要です。

// switch (式) {
//   case value1:
//     式の結果が value1 に一致する場合に実行する処理
//     break
//   case value2:
//     式の結果が value2 に一致する場合に実行する処理
//     break
//   default:
//     式の結果に一致する値がない場合に実行する処理
// }

// 例1 曜日を入力すると、その曜日に応じてアラームをセットする
const day = '日曜日'

// このコードでは、変数dayの値が「日曜日」なので、default節が実行され、'土日はオフです'が表示されます。
switch(day) {
  case '月曜日':
    console.log('6時30分に起こしてください')
    break
  case '火曜日':
    console.log('7時に起こしてください')
    break
  case '水曜日':
    console.log('6時20分に起こしてください')
    break
  case '木曜日':
    console.log('6時に起こしてください')
    break
  case '金曜日':
    console.log('5時30分に起こしてください')
    break
  default:
    console.log('土日はオフです')
}


// switch文とcase節
// switch文は、式（主に変数）が特定の値であったときに指定した処理を実行するために使用されます。
// 対象の式に多数のパターンが存在する場合に使用すると、if文で実装するよりも可読性の高いコードにすることができます。

// switch (式) {
//   case value1:
//     式の結果が value1 に一致する場合に実行する処理
//     break
//   case value2:
//     式の結果が value2 に一致する場合に実行する処理
//     break
//   default:
//     式の結果一致する値がない場合に実行する処理
// }

// 例1 気持ちによって発言を変える
var feel = 'good'
switch (feel) {
  case 'good':
    console.log('いい気分です')
    break
  case 'soso':
    console.log('まずまずな気分です')
    break
  case 'bad':
    console.log('気分が悪いです')
    break
  default:
    console.log('何とも言えません')
}

// また、複数のcase節に対して同じ処理を実行することができます。
// switch (式）{
//   case value1：
//   case value2：
//   case value3：
//     式の結果がvalue1、value2、value3のいずれかに一致する場合に実行する処理
//     break
//   case value4：
//   case value5：
//   case value6：
//      式の結果がvalue1、value2、value3のいずれかに一致する場合に実行する処理
//     break
//   default:
//     式の結果がいずれにも一致しない場合に実行する処理
// }

// 例2 各月に季節を割り振る
var month = 5
// このコードでは、変数monthが5であるため、'春です'がコンソールに出力されます。3でも4でも同じ結果が得られます。
switch (month) {
  case 12:
  case 1:
  case 2:
    console.log('冬です')
    break
  case 3:
  case 4:
  case 5:
    console.log('春です')
    break
  case 6:
  case 7:
  case 8:
    console.log('夏です')
    break
  case 9:
  case 10:
  case 11:
    console.log('秋です')
    break
  default:
    console.log('その月は存在しません')
}

