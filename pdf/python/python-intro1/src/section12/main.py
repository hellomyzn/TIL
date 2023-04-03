# 三項演算子
# pra12
import random
sai1 = random.randrange(1, 7)
sai2 = random.randrange(1, 7)
ch = '半' if (sai1 + sai2) % 2 else '丁'
print(f'{sai1}, {sai2}の{ch}')
