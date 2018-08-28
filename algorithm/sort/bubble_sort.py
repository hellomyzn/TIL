"""
flagを用いたバブルソート
"""

def bubbleSort(A=[], N=1):
    sw = 0
    flag = True
    count = 1
    while flag:
        i = 0
        j = N -1
        flag = False

        for i in range(j, i, -1):
            if(A[j] < A[j -1]):
                A[j], A[j -1] = A[j -1], A[j]
                flag = True
                sw += 1

            j -= 1

        print(count, "回目")
        print(A, "\n")
        i += 1
        count += 1
    return sw

A = []
N = int(input())
line = "===========================\n"
for i in range(N):
    A.append(int(input()))


print(line, A,"\n", line)
sw = bubbleSort(A, N)

