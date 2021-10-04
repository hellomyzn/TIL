"""
flagを用いたバブルソート
"""

def bubbleSort(A=None, N=1):
    sw = 0
    flag = True
    count = 1
    while flag:
        i = 0
        j = N -1
        flag = False

        for i in range(j, i, -1):
            if(A[i] < A[i -1]):
                A[i], A[i -1] = A[i -1], A[i]
                flag = True
                sw += 1

            # j -= 1

        print(count, "回目")
        print(A, "\n")
        # i += 1
        count += 1
    return sw


if __name__ == "__main__":

    A = []
    N = int(input("\n数列の長さを入力してください\n"))
    line = "===========================\n"
    for i in range(N):
        A.append(int(input(i, "個目の要素を入力してください\n")))
    print(line, A,"\n", line)
    sw = bubbleSort(A, N)

