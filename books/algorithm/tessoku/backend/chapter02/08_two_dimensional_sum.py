H, W = map(int, input().split())
X = [
    list(map(int, input().split())) for _ in range(H)
]

accum = [
    [0] * (W+1)
    for _ in range(H+1)
    ]

for i in range(1, H+1):
    for j in range(1, W+1):
        val = X[i-1][j-1]
        accum[i][j] = - accum[i-1][j-1] + accum[i-1][j] + accum[i][j-1] + val

Q = int(input())
for _ in range(Q):
    x1, y1, x2, y2 = map(int, input().split())
    x1 -= 1
    y1 -= 1
    print(accum[x1][y1] + accum[x2][y2] - accum[x1][y2] - accum[x2][y1])