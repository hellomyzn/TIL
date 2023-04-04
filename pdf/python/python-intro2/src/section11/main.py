# タプル型
# pra11
office = ('仙台事業所', '宇都宮事業所', '大宮事業所', '東京事業所', '神奈川事業所', '名古屋事業所', '大阪事業所', '福岡事業所')
office += ('新宿開発センター', '横浜開発センタ-')
print(office)
idx = office.index('東京事業所')
print(idx)
print(office[idx])

# パック / アンパック
# pra11_1
office_address = ('仙台', '宇都宮', '大宮', '新宿', '横浜', '名古屋', '大阪', '博多')
print(office_address)

# pra11_2
idx = office_address.index('新宿')
print(idx)

# pra11_3
idx = office_address.index('京都')
