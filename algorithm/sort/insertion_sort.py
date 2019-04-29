"""
Output elements of array turn
"""


"""
Insert sort
"""
def insertionSort(A=None, N=0):

    for n, i in enumerate(range(N)):
        v = A[i]
        j = i - 1
        while (j >= 0 and A[j] > v):
            A[j + 1] = A[j]
            j -= 1
        A[j + 1] = v
        print(n, "回目\n",A, "\n\n")
    print("完成\n",A)
    return A



if __name__ == "__main__":
    # 数列の長さ
    N = 0
    # 数列の配列
    A = []
    N = int(input("\n数列の長さを入力してください\n"))
    for i in range(N):
        A.append(int(input(i, "個目の要素を入力してください")))
        print("\n")
    A = insertionSort(A, N)
    print(A)
