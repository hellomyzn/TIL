package main

import "fmt"

func add(x, y int) (int, int){
	fmt.Println("add function")
	fmt.Println(x + y)

	return x + y, x * y
}

func cal(price, item int) (result int){
	result = price * item
	return result
}

func main(){
	add(10, 30)
	r1, r2 := add(20, 40)
	fmt.Println(r1, r2)

	r3 := cal(300, 2)
	fmt.Println(r3)

	f := func(x int){
		fmt.Println("inner func", x)
	}
	f(1)

	func(x int){
		fmt.Println("inner func", x)
	}(2)
}