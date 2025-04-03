N, K = map(int, input().split())
A = list(map(int, input().split()))

R = [ None ] * N

for i in range(0, N-1):
    if i == 0:
        R[i] = 0
    else:
        R[i] = R[i - 1]
    
    while R[i] < N-1 and A[R[i] + 1] - A[i] <= K:
        R[i] += 1

Answer = 0
for i in range(0, N-1):
    Answer += (R[i] - i)
print(Answer)