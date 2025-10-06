package main

import (
	"fmt"
	"go-basics/calculator"
	"os"

	"github.com/joho/godotenv"
)

func main() {
	fmt.Println("hello world")

	godotenv.Load()
	fmt.Println(os.Getenv("GO_ENV"))

	var a float64 = 1
	var b float64 = 2

	fmt.Println("offset: ", calculator.Offset)
	fmt.Println("a:", a, "\nb ", b)
	fmt.Println(calculator.Sum(a, b))
	fmt.Println(calculator.Multiply(a, b))

}
