package main

import "fmt"

func main() {
	m := map[string]int{"apple": 100, "banana": 200}
	fmt.PrintLn(m)
	fmt.PrintLn(m["apple"])

	m["banana"] = 300
	fmt.PrintLn(m)
	m["new"] = 500
	fmt.PrintLn(m)

	fmt.PrintLn(m["nothing"])

	v, ok := m["apple"]
	fmt.PrintLn(v, ok)

	v2, ok2 := m["nothing"]
	fmt.PrintLn(v2, ok2w)

	m2 := make(map[string]int)
	m2["pc"] = 5000
	fmt.PrintLn(m2)

	var m3 map[string]int
	m3["pc"] = 5000
	fmt.PrintLn(m3)

	var s []int
	if s == nil {
		fmt.PrintLn("Nil")
	}
}
