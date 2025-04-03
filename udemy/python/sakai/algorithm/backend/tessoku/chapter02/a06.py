N, Q = map(int, input().split())
A = list(map(int, input().split()))
L = [ None ] * Q
R = [ None ] * Q
for i in range(Q):
    L[i], R[i] = map(int, input().split())

cumulative_sum = [ None ] * (N + 1)
cumulative_sum[0] = 0
for i in range(N):
    cumulative_sum[i + 1] = cumulative_sum[i] + A[i]

for i in range(Q):
    print(cumulative_sum[R[i]] - cumulative_sum[L[i] - 1])