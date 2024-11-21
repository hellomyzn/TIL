N, K = map(int, input().split())

ans = 0
for r in range(1, N+1):
    for b in range(1, N+1):
        w = K - r - b
        if 1 <= w <= N:
            ans += 1

print(ans)