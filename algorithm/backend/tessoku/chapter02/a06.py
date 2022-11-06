N, Q = map(int, input().split())
A = list(map(int, input().split()))
L = []
for q in range(Q):
    l, r = map(int, input().split())
    L.append([l, r])

ruiseki = []
temp = 0
for i,v in enumerate(A):
    temp += v
    ruiseki.append(temp)

for l in L:
    s, u = l[0], l[1]
    turnout = ruiseki[]