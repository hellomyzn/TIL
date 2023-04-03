# 組込み関数
# print
ix, iy = 10, 20
print('ix =', ix, 'iy =', iy)
print('ix = %d iy = %d' % (ix, iy))
print('ix = {} iy = {}'.format(ix, iy))
print(f'ix = {ix} iy = {iy}')
print(f'{ix = } {iy = }')

ix, iy = 10, 20.5
print('ix =', ix, 'iy =', iy)
print('ix = %04d iy = %2.1f' % (ix, iy))
print('ix = {:04d} iy = {:2.1f}'.format(ix, iy))
print(f'ix = {ix:04d} iy = {iy:2.1f}')
print(f'{ix = :04d} {iy = :2.1f}')


# filter
nums = [2, 5, 9, 1, 3, 8, 10]
def odd(num):
    if num % 2 == 0:
        return True
    else:
        return False
fnums = filter(odd, nums)
odd_nums = list(fnums)
print(odd_nums)


# map
def multi2(num):
    return num * 2
dnums = map(multi2, nums)
double_num = list(dnums)
print(dnums)
print(double_num)

from math import pi
print(round(pi))
print(round(pi, 2))
print(round(pi * 100, -1))


# pra14_1
ary = [3, 5, 7, 1, 5, 9]
print(ary)
ary = sorted(ary)
print(ary, 'reversed')


# pra14_2
result = sum(ary)
print('sum', result)
