# 辞書型
# pra13_1
japanese = {'PROF' : '会社情報', 'SERV' : ''}
print(japanese['PROF'])
print(japanese['SERV'])

english = {'PROF' : 'COMPANY PROFILE', 'SERV' : 'SERVICE'}
for lang in [japanese, english]:
    print(lang['PROF'], '/', lang['SERV'])

# pra13_2
fruits = {'リンゴ' : '赤', 'みかん' : '橙', 'レモン' : '黄', 'バナナ' : '黄'}
fruits_list = [x for x in fruits.keys()]
print(fruits_list)
print('リンゴ' in fruits.keys())

fruits_colors = {x for x in fruits.values()}
print(fruits_colors)

# pra13_3
fruits['もも'] = '桃'
color = fruits.setdefault('キウイ', '緑')
print(color)

color = fruits.setdefault('キウイ', '黄')
print(color)
print(fruits)


# pra13_4
fruits.pop('バナナ')
print(fruits)


# pra13_5
for k, v in fruits.items():
    print(k, v)


# q13_1
season = {'春': '桜', '夏': '太陽', '秋': '枯葉', '冬': '雪'}
print(season)

# q13_2
season['夏'] = '向日葵'
print(season)

# q13_3
season.setdefault('早春', '若葉')
season.setdefault('晩夏', '雷')
print(season)
