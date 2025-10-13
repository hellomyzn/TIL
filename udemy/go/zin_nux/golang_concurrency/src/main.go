package main

import (
	"fmt"
	"unsafe"
)

// const secret = "abc"

// type Os int

// const (
// 	Mac Os = iota + 1
// 	Windows
// 	Linux
// )

// var (
// 	i int
// 	s string
// 	b bool
// )

func main() {
	// fmt.Println("hello world")

	// godotenv.Load()
	// fmt.Println(os.Getenv("GO_ENV"))

	// var a float64 = 1
	// var b float64 = 2

	// fmt.Println("offset: ", calculator.Offset)
	// fmt.Println("a:", a, "\nb ", b)
	// fmt.Println(calculator.Sum(a, b))
	// fmt.Println(calculator.Multiply(a, b))

	// var i int
	// var i2 int = 2
	// var i3 = 3
	// i4 := 4
	// ui := uint16(5)
	// fmt.Println(i)
	// fmt.Println(i2)
	// fmt.Println(i3)
	// fmt.Println(i4)
	// fmt.Println(ui)

	// fmt.Printf("i: %v %T\n", i, i)
	// fmt.Printf("i: %[1]v %[1]T ui: %[2]v %[2]T\n", i, ui)

	// f := 1.2345
	// s := "hello"
	// b := true
	// fmt.Printf("f: %[1]v %[1]T \n", f)
	// fmt.Printf("s: %[1]v %[1]T \n", s)
	// fmt.Printf("b: %[1]v %[1]T \n", b)

	// pi, title := 3.14, "Go"
	// fmt.Printf("pi: %v title: %v\n", pi, title)

	// x := 10
	// y := 1.23
	// z := float64(x) + y
	// println(z)

	// fmt.Printf("Mac: %v Win: %v Lin: %v \n", Mac, Windows, Linux)

	// var var1 int = 1
	// fmt.Println((var1))
	// var1 = 2
	// fmt.Println((var1))
	// var1 += 1
	// fmt.Println((var1))

	var ui1 uint16
	fmt.Printf("memory address of ui1: %p\n", &ui1)

	var ui2 uint16
	fmt.Printf("memory address of ui2: %p\n", &ui2)

	var p1 *uint16
	fmt.Printf("value of p1: %v\n", p1)
	p1 = &ui1
	fmt.Printf("value of p1: %v\n", p1)
	fmt.Printf("size of p1: %d[bytes]\n ", unsafe.Sizeof(p1))
	fmt.Printf("memory address of p1: %p\n", &p1)
	fmt.Printf("value of ui1(dereference): %v\n", *p1)

	var pp1 **uint16 = &p1
	fmt.Printf("value of pp1: %v\n", pp1)
	fmt.Printf("size of pp1: %d[bytes]\n ", unsafe.Sizeof(pp1))
	fmt.Printf("memory address of pp1: %p\n", &pp1)

	fmt.Printf("value of p1(dereference): %v\n", *pp1)
	fmt.Printf("value of ui1(dereference): %v\n", **pp1)

	ok, result := true, "A"
	fmt.Printf("memory address of result: %p\n", &result)
	if ok {
		result := "B"
		fmt.Printf("memory address of result: %p\n", &result)
		println(result)
	} else {
		result := "C"
		println(result)
	}

	println(result)

}
