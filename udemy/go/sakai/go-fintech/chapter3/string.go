package main

import "fmt"
import "strings"

func main() {
	fmt.Println("Hello world")
	fmt.Println("Hello" + "world")
	fmt.Println(string("Hello World"[0]))
	var s string = "Hellow World"

	s = strings.Replace(s, "H", "X", 1)
	fmt.Println(s)
	fmt.Println(strings.Contains(s, "World"))

	fmt.Println(`Test
                            Test
Test`)

	fmt.Println("\"")
	fmt.Println('"')
}
