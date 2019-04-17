import list_generator



def bubbleSort(A=None, N=1):
    sw = 0
    flag = True
    count = 1

    while flag:
        i = 0
        j = N - 1
        flag = False

        for i in range(j, i, -1):
            if A[j] < A[j -1]:
                A[j], A[j-1] = A[j-1], A[j]
                flag = True
                sw += 1

            j -= 1
        print(count, "周目")
        print(A, "\n")
        i += 1
        count += 1
    return sw



if __name__ == "__main__":
    A = list_generator.fib_generator()

