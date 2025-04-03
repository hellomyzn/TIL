line = "----------------------------"
print("入力する数を設定してください。 : ")
n = int(input())
r = []



print("start")

for i in range(n):
    print(line, "1~10の間から入力してください", line)
    r.append(int(input()))

maxv = -2000000000
minv = r[0]

for i in range(n):
    maxv = max(maxv, r[i] - minv)
    minv = min(minv, r[i])

print(maxv)
