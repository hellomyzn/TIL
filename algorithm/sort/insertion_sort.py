"""
Output elements of array turn
"""

def trace(A, N):
    print(A)
    # for i in range(N):
        # if (i >= 0):
            # print("")
            # print(A[i])
            # print(A)
    print("\n")


"""
Insert sort
"""
def insertionSort(A, N):

    for i in range(N):
        v = A[i]
        j = i - 1
        while (j >= 0 and A[j] > v):
            A[j + 1] = A[j]
            j -= 1
        A[j + 1] = v
        trace(A, N)



# 数列の長さ
N = 0
# 数列の配列
A = []

print("\n数列の長さを入力してください\n")
N = int(input())

for i in range(N):
    print(i, "個目の要素を入力してください")
    A.append(int(input()))
    print("\n")

insertionSort(A, N)

