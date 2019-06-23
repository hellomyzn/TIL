package main

import "fmt"

func main(){
    var a [2]int
    a[0] = 100
    a[1] = 200
    fmt.Println(a)

    var b [2]int = [2]int{100, 200}
    // サイズ変更するとエラーが出る
    // b = append(b,300)
    fmt.Println(b)



    var c []int = []int{100, 200}
    c = append(c, 300)
    fmt.Println(c)
}
