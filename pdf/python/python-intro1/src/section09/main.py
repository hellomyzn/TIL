# Break文制御
# pra9_1
ary = [5, 7, 3, 8, 4, 1, 6]
for ix in ary:
    if ix % 2 == 0:
        print('見つかった2の倍数は', ix)
        break
    else:
        print('ありません')


# pra9_2
arys = [ [12,2,2,3], [23], [34,2,17], [45,3,3,5] ]
for row in range(len(arys)):
    for col in range(len(arys[row])):
        if arys[row][col] == 34:
            print('row :', row, ' col :', col)
            break
    else:
        continue
    break
