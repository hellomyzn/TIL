# データ型
arys = [ 30298, 'ジャパニアス', [1999, 12, 1]]
for elem in arys:
    if isinstance(elem, int):
        print('社員番号: ', elem)
    elif isinstance(elem, str):
        print('名前: ', elem)
    elif isinstance(elem, list):
        print('生年月日 :', '{0}/{1}/{2}'.format(elem[0], elem[1], elem[2]))
