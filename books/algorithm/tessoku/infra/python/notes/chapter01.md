# Chapter01

## 05 Three Cardsh
```
問題文
赤・青・白の 
3 枚のカードがあります。
太郎君は、それぞれのカードに 
1 以上 
N 以下の整数を書かなければなりません。
3 枚のカードの合計を 
K にするような書き方は何通りありますか。

制約
N は 
1 以上 
3000 以下の整数
K は 
3 以上 
9000 以下の整数
```
### Properties
- [Task](https://atcoder.jp/contests/tessoku-book/tasks/tessoku_book_e)
- [Answer](https://github.com/E869120/kyopro-tessoku/blob/main/codes/python/chap01/answer_A05.py)
 
### Note
**アルゴリズムを考える前に計算量を考える**

全探索するとNの3乗でNが3000だから、
```
N^3 = 27 * 10^9
```
N^10より小さい数になる。
制限時間2秒は目安として大体10^7-8ぐらいが良い。

**解き方**
赤、青を全探索し、白の数が`1 <= X <= N` であればOK
計算量も
```
N^2 = 4 * 10^6
```
N^7より小さい数になるからOK
