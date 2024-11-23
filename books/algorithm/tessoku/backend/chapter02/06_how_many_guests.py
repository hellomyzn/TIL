N, Q = map(int, input().split())
A = list(map(int, input().split()))

accum = [0] * N

accum[0] = A[0]
for i in range(1, N):
    accum[i] = accum[i-1] + A[i]

for _ in range(Q):
    L, R = map(int, input().split())
    L -= 1
    R -= 1
    ans = accum[R] - (accum[L-1] if L > 0 else 0)
    print(ans)