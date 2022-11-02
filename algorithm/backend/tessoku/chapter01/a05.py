N, K = map(int, input().split())
Answer = 0

for i in range(1, N+1):
    for j in range(1, N+1):
        k = K - i - j
        print(k)
        if 0 < k and k <= N:
            Answer += 1

print(Answer)
