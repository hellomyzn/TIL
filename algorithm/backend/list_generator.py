def fib_generator():
    A = []
    N = int(input("生成するフィボナッチ数列の要素数を整の値で入力してください : "))
    a, b = 0, 1
    A.append(b)
    for i in range(N - 1):
        a, b = b, a+b
        A.append(b)
    return A


def self_generator():
    A = []
    N = int(input("\n数列の長さを入力してください\n"))
    for i in range(N):
        A.append(int(input(str(i + 1) + "個目の要素を入力してください : ")))
    return A

