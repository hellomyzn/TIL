N, X = map(int, input().split())
A = list(map(int, input().split()))

found = any(X == a for a in A)
if found:
    print("Yes")
else:
    print("No")
