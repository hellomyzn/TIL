# 0(log(n))
def func2(n):
    if n <= 1:
        return 
    else:
        print(n)
        func2(n/2)


# 0(n)
def func3(numbers):
    for num in numbers:
        print(num)


# 0(n * log(n))
def func4(n):
    for i in range(int(n)):
        print(i, end=' ')
    print()

    if n <= 1:
        return
    func4(n/2)


# 0(n**2)
def func5(numbers):
    for i in range(len(numbers)):
        for j in range(len(numbers)):
            print(numbers[i], numbers[j])
        print()



# func2(10) 
# func3([1,2,3,4,5])
# func4(10)
func5([1,2,3,4,5])