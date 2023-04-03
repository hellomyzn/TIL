# string
# pra2_1_1
hi = 'Hello'
print(hi)

# pra2_1_2
world = 'World!!'
hello = hi + ' ' + world
print(hello)

# pra2_1_3
yousya = '俺TU' + 'E'*3
print(yousya)
greeen = 'GR' + 4*'e' + 'N'
print(greeen)

# pra2_1_4
address = '神奈川県横浜市西区' 'みなとみらい2-2-1'
print(address)
address = ('神奈川県横浜市西区'
             'みなとみらい2-2-1')
print(address)


# raw string
# pra2_1_5
user_path = 'C:\\Users'
user_path2 = r'C:\Users'
print(user_path)
print(user_path2)

# heredoc
# pra2_1_6
address = '''\
神奈川県横浜市西区
みなとみらい\
2-2-1'''
print(address)

# q2_1
philosophy = '''\
先端テクノロジーで
日本の明日に新たな価値を提供する
'''
print(philosophy)

# 変換
# pra2_2_1
ix = 1234
sx = str(ix)
print(sx)

# pra2_2_2
sy = '5432'
iy = int(sy)
print(iy)


# pra2_3_1
ch = 'A'
code = ord(ch)
print(ch, 'の文字コードは', hex(code))

# pra2_3_2
code = 0x42
ch = chr(code)
print('文字コード', hex(code), 'の文字は', ch)

# 文字列長、データ型
# pra2_4_1
name = 'ジャパニアス株式会社'
length = len(name)
print(length, '文字')

# pra2_4_2
print(type(name))

# exe2_2
money = 128500
salary = f'今月の給料は{money}円です。'
print(salary)
