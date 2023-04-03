# if文制御
# pra6_1
press = 138
print(f'血圧 = {press}', end="")
if press < 114:
    print('は低血圧')
elif press < 134:
    print('は正常')
else:
    print('は高血圧')


# pra6_2
msg = input('enter something >>> ')
if msg:
    print(msg)
else:
    print('enter something!!!')

# q6
ix = 12345 // 543
if ix % 2 == 0:
    print(f'{ix} は偶数')
else:
    print(f'{ix} は奇数')
