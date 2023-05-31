N, X = map(int, input().split())
A = list(map(int, input().split()))

# if X in A:
#     print("Yes")
# else:
#     print("No")

found = False
for a in A:
    if a == X:
        found = True

if found:
    print("Yes")
else:
    print("No")
