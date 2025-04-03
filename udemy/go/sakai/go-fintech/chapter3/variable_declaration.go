package main

import "fmt"

func main() {
	// var i int = 1
	// var f64 float64 = 1.2
	// var s string = "test"
	// var t, f bool = true, false
	// fmt.Println(i, f64, s, t, f)
	//

	// var (
	//
	// i int = 1
	// f64 float64 = 1.2
	// s string = "test"
	// t, f bool = true, false
	//
	// )

	// var (
	//
	// i int
	// f64 float64
	// s string
	// t, f bool
	//
	// )

	xi := 1
	xf64 := 1.2
	var xf32 float32 = 1.2
	xs := "test"
	xt, xf := true, false

	fmt.Println(xi, xf64, xs, xt, xf)
	fmt.Printf("%T", xf32)

}
