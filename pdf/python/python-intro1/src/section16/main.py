# コマンドの引数

import sys
print(*sys.argv)


def clear_specified_value_inlist(arys: list, value: int) -> int:
    count = 0
    for row in range(len(arys)):
        if isinstance(arys[row], list):
            for col in range(len(arys[row])):
                if arys[row][col] == value:
                    arys[row][col] = 0
                    count += 1
        else:
            if arys[row] == value:
                arys[row] = 0
                count += 1
    return count

ary = [5,8,3,1,3,7]
cnt = clear_specified_value_inlist(ary, 3)
print(ary, cnt, '個')

arys = [[5,8],3,[1,3,7]]
cnt = clear_specified_value_inlist(arys, 3)
print(arys, cnt, '個')
