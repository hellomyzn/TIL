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

type Task struct {
	Title    string
	Estimate int
}

func main() {

	task1 := Task{
		Title:    "Learn Golang",
		Estimate: 3,
	}

	task1.Title = "Learn Go"
	fmt.Printf("%[1]T %+[1]v %v\n", task1, task1.Title)
	var task2 Task = task1
	task2.Title = "new"
	fmt.Printf("task1: %v task2: %v\n", task1.Title, task2.Title)

	task1p := &Task{
		Title:    "Learn concurrency",
		Estimate: 2,
	}
	fmt.Printf("task1p: %T %+v %v\n", task1p, *task1p, unsafe.Sizeof(task1p))
	task1p.Title = "CHanged"
	fmt.Printf("task1p: %+v\n", *task1p)
	var task2p *Task = task1p
	task2p.Title = "Changed by Task2"
	fmt.Printf("task1: %+v\n", *task1p)
	fmt.Printf("task2: %+v\n", *task2p)

	task1.extendEstimate()
	fmt.Printf("task1 value receiver: %+v\n", task1.Estimate)
	(&task1).extendEstimatePointer()
	fmt.Printf("task1 value receiver: %+v\n", task1.Estimate)

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

	// var ui1 uint16
	// fmt.Printf("memory address of ui1: %p\n", &ui1)

	// var ui2 uint16
	// fmt.Printf("memory address of ui2: %p\n", &ui2)

	// var p1 *uint16
	// fmt.Printf("value of p1: %v\n", p1)
	// p1 = &ui1
	// fmt.Printf("value of p1: %v\n", p1)
	// fmt.Printf("size of p1: %d[bytes]\n ", unsafe.Sizeof(p1))
	// fmt.Printf("memory address of p1: %p\n", &p1)
	// fmt.Printf("value of ui1(dereference): %v\n", *p1)

	// var pp1 **uint16 = &p1
	// fmt.Printf("value of pp1: %v\n", pp1)
	// fmt.Printf("size of pp1: %d[bytes]\n ", unsafe.Sizeof(pp1))
	// fmt.Printf("memory address of pp1: %p\n", &pp1)

	// fmt.Printf("value of p1(dereference): %v\n", *pp1)
	// fmt.Printf("value of ui1(dereference): %v\n", **pp1)

	// ok, result := true, "A"
	// fmt.Printf("memory address of result: %p\n", &result)
	// if ok {
	// 	result := "B"
	// 	fmt.Printf("memory address of result: %p\n", &result)
	// 	println(result)
	// } else {
	// 	result := "C"
	// 	println(result)
	// }

	// println(result)

	// var a1 [3]int
	// var a2 = [3]int{10, 20, 30}
	// a3 := [...]int{10, 20}
	// fmt.Printf("%v, %v, %v\n", a1, a2, a3)
	// fmt.Printf("%v, %v, %v\n", len(a1), a2, a3)
	// fmt.Printf("%v, %v, %v\n", cap(a1), a2, a3)
	// fmt.Printf("%T, %T, %T\n", cap(a1), a2, a3)

	// var s1 []int
	// s2 := []int{}
	// fmt.Printf("s1: %[1]T %[1]v %v %v\n", s1, len(s1), cap(s1))
	// fmt.Printf("s2: %[1]T %[1]v %v %v\n", s2, len(s2), cap(s2))
	// fmt.Println(s1 == nil)
	// fmt.Println(s2 == nil)
	// s1 = append(s1, 1, 2, 3)
	// fmt.Printf("s1: %[1]T %[1]v %v %v\n", s1, len(s1), cap(s1))
	// s3 := []int{4, 5, 6}
	// s1 = append(s1, s3...)
	// fmt.Printf("s1: %[1]T %[1]v %v %v\n", s1, len(s1), cap(s1))
	// s4 := make([]int, 0, 2)
	// fmt.Printf("s4: %[1]T %[1]v %v %v\n", s4, len(s4), cap(s4))
	// s5 := make([]int, 4, 6)
	// fmt.Printf("s5: %[1]T %[1]v %v %v\n", s5, len(s5), cap(s5))
	// s6 := s5[1:3]
	// s6[1] = 10
	// fmt.Printf("s5: %[1]T %[1]v %v %v\n", s5, len(s5), cap(s5))
	// fmt.Printf("s6: %[1]T %[1]v %v %v\n", s6, len(s6), cap(s6))
	// s6 = append(s6, 2)
	// fmt.Printf("s5: %[1]T %[1]v %v %v\n", s5, len(s5), cap(s5))
	// fmt.Printf("s6: %[1]T %[1]v %v %v\n", s6, len(s6), cap(s6))

	// sc6 := make([]int, len(s5[1:3]))
	// fmt.Printf("s5: %[1]T %[1]v %v %v\n", s5, len(s5), cap(s5))
	// fmt.Printf("sc6: %[1]T %[1]v %v %v\n", sc6, len(sc6), cap(sc6))
	// copy(sc6, s5[1:3])
	// fmt.Printf("sc6: %[1]T %[1]v %v %v\n", sc6, len(sc6), cap(sc6))
	// sc6[1] = 12
	// fmt.Printf("s5: %[1]T %[1]v %v %v\n", s5, len(s5), cap(s5))
	// fmt.Printf("sc6: %[1]T %[1]v %v %v\n", sc6, len(sc6), cap(sc6))

	// s5 = make([]int, 4, 6)
	// fs6 := s5[1:3:3]
	// fmt.Printf("s5: %[1]T %[1]v %v %v\n", s5, len(s5), cap(s5))
	// fmt.Printf("sc6: %[1]T %[1]v %v %v\n", fs6, len(fs6), cap(fs6))
	// fs6[0] = 6
	// fs6[1] = 7
	// fs6 = append(fs6, 8)
	// fmt.Printf("s5: %[1]T %[1]v %v %v\n", s5, len(s5), cap(s5))
	// fmt.Printf("sc6: %[1]T %[1]v %v %v\n", fs6, len(fs6), cap(fs6))
	// s5[3] = 9
	// fmt.Printf("s5: %[1]T %[1]v %v %v\n", s5, len(s5), cap(s5))
	// fmt.Printf("sc6: %[1]T %[1]v %v %v\n", fs6, len(fs6), cap(fs6))

	// var m1 map[string]int
	// m2 := map[string]int{}
	// fmt.Printf("%v %v \n", m1, m1 == nil)
	// fmt.Printf("%v %v \n", m2, m2 == nil)
	// m2["A"] = 10
	// m2["B"] = 20
	// m2["C"] = 0
	// fmt.Printf("%v %v %v\n", m2, len(m2), m2["A"])
	// delete(m2, "A")
	// fmt.Printf("%v %v %v\n", m2, len(m2), m2["A"])
	// v, ok := m2["A"]
	// fmt.Printf("%v %v\n", v, ok)
	// v, ok = m2["C"]
	// fmt.Printf("%v %v\n", v, ok)

	// for k, v := range m2 {
	// 	fmt.Printf("%v %v\n", k, v)
	// }
}

func (task Task) extendEstimate() {
	task.Estimate += 10
}
func (task *Task) extendEstimatePointer() {
	task.Estimate += 10
}
