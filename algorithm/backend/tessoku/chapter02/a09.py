H, W, N = map(int, input().split())
X1 = [ None ] * N
Y1 = [ None ] * N
X2 = [ None ] * N
Y2 = [ None ] * N

for i in range(N):
    X1[i], Y1[i], X2[i], Y2[i], = map(int, input().split())

diff = [[ 0 ] * (W*2) for _ in range(H+2)]
cumulative_sum = [ [ 0 ] * (W*2) for _ in range(H+2)]

for i in range(N):
    diff[X1[i]][Y1[i]] += 1
    diff[X2[i] + 1][Y2[i] + 1] += 1
    diff[X2[i] + 1][Y1[i]] -= 1
    diff[X1[i]][Y2[i] + 1] -= 1

# ->
for h in range(1, H+1):
    for w in range(1, W+1):
        cumulative_sum[h][w] = cumulative_sum[h][w-1] + diff[h][w]

# V
for w in range(1, W+1):
    for h in range(1, H+1):
        cumulative_sum[h][w] = cumulative_sum[h-1][w] + cumulative_sum[h][w]

for h in range(1, H+1):
    for w in range(1, W+1):
        print(cumulative_sum[h][w], end=" ")
    print("")