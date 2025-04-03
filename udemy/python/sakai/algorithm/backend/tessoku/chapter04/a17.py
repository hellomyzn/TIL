N = int(input())
A = [ 0 ] + list(map(int, input().split()))
B = [ 0, 0 ] + list(map(int, input().split()))

# 最短時間
dp = [0] * N
dp[1] = A[1]
for i in range(2, N):
    useA = dp[i-1] + A[i]
    useB = dp[i-2] + B[i]
    dp[i] = min(useA, useB)

# 最短経路
path = []
place = N
while True:
    path.append(place)

    if place == 1:
        break
    
    if dp[place -2] + A[place -1] == dp[place -1]:
        place = place - 1
    else:
        place = place - 2

path.reverse()

answer = [str(i) for i in path]
print(len(answer))
print(" ".join(answer))
