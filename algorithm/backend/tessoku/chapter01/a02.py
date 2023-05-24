N, X = map(int, input().split())
A = list(map(int, input().split()))
found = False

for i in range(N):
    if A[i] == X:
        found = True

if found == True:
    print("Yes")
else:
    print("No")


