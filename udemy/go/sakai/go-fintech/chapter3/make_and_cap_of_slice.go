package main

import "fmt"

func main() {

	// 3の要素数、5が最大要素数の配列を作成
	n := make([]int, 3, 5)
	fmt.Printf("len=%d cap=%d value=%v \n", len(n), cap(n), n)

	n = append(n, 0, 0)
	fmt.Printf("len=%d cap=%d value=%v \n", len(n), cap(n), n)

	// cap以上の値を追加しても大丈夫
	n = append(n, 1, 1, 1, 1, 1, 1)
	fmt.Printf("len=%d cap=%d value=%v \n", len(n), cap(n), n)

	// 長さもcapも3になる
	a := make([]int, 3)
	fmt.Printf("len=%d cap=%d value=%v \n", len(a), cap(a), a)

	// 0のスライスをメモリに確保する
	b := make([]int, 0)
	// メモリに確保しない状態
	var c []int

	// どちらも結果は同じになる
	fmt.Printf("len=%d cap=%d value=%v \n", len(b), cap(b), b)
	fmt.Printf("len=%d cap=%d value=%v \n", len(c), cap(c), c)

}
