"""
1行が長くなる場合
"""
# 横が80文字以内にする
x = 1 + 1 + 1 + 1 + 1 + 1 + 1 + 1 + 1 + 1 + 1 + 1 + 1 +\
    + 1 + 1 + 1 + 1

print(x)


"""
if文
"""
x = -10

if x < 0:
    print("negative")
elif == 0:
    print("zero")
else
    print("positive")


"""
論理演算子
"""

a = 2
b = 2

a == b
a != b
a < b
a > b
a <= b
a >= b
a > 0 and b > 0
a > 0 or b > 0
a is b



"""
in と not
"""


y = [1,2,3]
x = 1

if x in y:
    print("in")

if 100 not in y:
    print("not in")


is_ok = True
if not is_ok:
    print("hello")


"""
Noneの判定
"""

is_empty = None
if is_empty is not None:
    print("None")



"""
While
"""

count = 0
while count < 5:
    print(count)
    count += 1


while True:
    if count >= 5:
        break

    if count == 2:
        count += 1
        continue
    print(count)
    count += 1


while count < 5:
    print(count)
    count += 1
else:
    print("done")
    
