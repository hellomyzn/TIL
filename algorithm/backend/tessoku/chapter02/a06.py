N, Q = map(int, input().split())
A = list(map(int, input().split()))
L = [ None ] * Q
R = [ None ] * Q
for i in range(Q):
    L[i], R[i] = map(int, input().split())

S = [ None ] * (N + 1)
S[0] = 0
for i in range(N):
    S[i + 1] = S[i] + A[i]

for i in range(Q):
    print(S[R[i]] - S[L[i] - 1])