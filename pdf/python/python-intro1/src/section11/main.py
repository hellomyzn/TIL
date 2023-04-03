# 論理演算(論理積)
# pra11_1

ary = [5, 7, 3, 8, 4, 1, 6]
for ix in ary:
    if ix % 2 == 0 and ix % 3 == 0:
        print(ix)

# pra11_2
selected_name = 'aoki' and 'inoue' and 'ueda'
print(selected_name)

# q11
count = 0
for ix in range(1, 101):
    if ix % 13 == 0 or ix % 17 == 0:
        count += 1
print(count, '個')

