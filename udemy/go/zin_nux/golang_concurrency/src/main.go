package main

import (
	"context"
	"fmt"
	"log"
	"os"
	"runtime"
	"runtime/trace"
	"time"
)

func main() {
	// var wg sync.WaitGroup
	// wg.Add(1)
	// go func() {
	// 	defer wg.Done()
	// 	fmt.Println("goroutine invoked")
	// }()
	// wg.Wait()
	// fmt.Printf("num of working goroutines: %d\n", runtime.NumGoroutine())
	// fmt.Printf("main func finish\n")

	f, err := os.Create("trace.out")
	if err != nil {
		log.Fatalln("Error", err)
	}

	defer func() {
		if err := f.Close(); err != nil {
			log.Fatalln("Error", err)
		}
	}()

	if err := trace.Start(f); err != nil {
		log.Fatalln("Error", err)
	}
	defer trace.Stop()
	ctx, t := trace.NewTask(context.Background(), "main")
	defer t.End()

	fmt.Println("The number of logical CPU Cores: ", runtime.NumCPU())
	task(ctx, "Task1")
	task(ctx, "Task2")
	task(ctx, "Task3")
}

func task(ctx context.Context, name string) {
	defer trace.StartRegion(ctx, name).End()
	time.Sleep(time.Second)
	fmt.Println(name)
}
