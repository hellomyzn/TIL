D = int(input())
N = int(input())
L = [ None ] * N
R = [ None ] * N

for i in range(N):
    L[i], R[i] = map(int, input().split())

# 前日比に加算
B = [0] * (D+2)
for i in range(N):
    B[L[i]] += 1
    B[R[i] + 1] -= 1

# 累積和をとる
A = [ None ] * (D+2)
A[0] = 0
for i in range(D+1):
    A[i + 1] = A[i] + B[i+1]

for i in range(1, D+1):
    print(A[i])