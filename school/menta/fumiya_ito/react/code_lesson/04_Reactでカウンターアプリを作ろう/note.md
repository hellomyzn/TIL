## 論理積（&&）

左から順番に値を確認（評価）し、値が偽値（false）であった場合は他の値を確認（評価）せずに、偽値（false）であった値を返します。
すべての値が真値（true）であった場合は最後の値を返します。

例1: 値がともに真値である場合
```jsx
const score = 20
const value = score < 100 && 0 < score 
console.log(value)  // true と出力
```

例2: 最初の値が偽値である場合
```jsx
const score = null
const value = score && score === null
console.log(value)  // null と出力
```

例3: 3つの値の途中で偽値がある場合
```jsx
const value = 1 && null && 'hoge'
console.log(value)  // null と出力
```