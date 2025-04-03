import bisect

# 座標圧縮
N = int(input())
A = list(map(int, input().split()))

# ソート、重複を消す
unique = sorted(list(set(A)))

B = [ None ] * N
for i in range(N):
    B[i] = bisect.bisect_left(unique, A[i])
    B[i] += 1

answer = [ str(i) for i in B]
print(" ".join(answer))
