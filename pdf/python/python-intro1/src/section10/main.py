# 論理演算(論理和)
# pra10_1
ary = [5, 7, 3, 8, 4, 1, 6]
for ix in ary:
    if ix % 2 == 0 or ix % 3 == 0:
        print(ix)
        break
    else:
        print('ありません')


# pra10_2
selected_name = '' or 'aoki' or 'inoue' or 'ueda'
print(selected_name) # aoki
