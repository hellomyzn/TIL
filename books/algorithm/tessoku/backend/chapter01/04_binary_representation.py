N = int(input())
ans = [0] * 10

for i in range(9, -1, -1):
    if N - (2 ** i) >= 0:
        N -= 2 ** i
        ans[i] = 1
ans.reverse()
print("".join(list(map(str, ans))))