# 内記表記
# pra_14_1
ceLeague = ['巨人', 'ヤクルト', 'DeNA', '中日', '阪神', '広島']
BattleCard = [[a, b] for a in ceLeague for b in ceLeague if a != b]
for b in BattleCard:
    print(b)

# pra_14_2
ary = [[x+y*3+1 for x in range(3)] for y in range(3)]
print(ary)
for a in ary:
    print(a)


# pra_14_3
ary2 = [[x+y*3+1 if x >= y else 0 for x in range(3)] for y in range(3)]
for a in ary2:
    print(a)


# q14_1
BattleCard = [print(f'{a} X {b}') for a in ceLeague for b in ceLeague if a != b]

# q14_2
ary3 = [[x * y  for x in range(1, 4)] for y in range(1, 4)]
for a in ary3:
    print(a)

