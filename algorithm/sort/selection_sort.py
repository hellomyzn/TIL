def selectionSort(A=None, N=0):
    i, j, t, sw, = 0, 0, 0, 0
    for i in range(N):
        minj = i

        # 最小値を検索
        for j in range(i, N):
            if(A[j] < A[minj]):
                minj = j

        # 最小値を入れ替える
        A[i], A[minj] = A[minj], A[i]

        if(i != minj):
            sw += 1
    print(A)
    return sw


if __name__ == "__main__":

    # 任意の要素の配列を入力
    A = []
    N = int(input())
    for i in range(N):
        A.append(int(input()))
    sw = selectionSort(A, N)
    print(A)
    print(sw)
