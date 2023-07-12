def test_fun(x, l=[]):
    l.append(x)
    return l
y = [1,2,3]
r = test_fun(100, y)
print(r)

x = [1,2,3]
r = test_fun(200, y)
print(r)

# 初期化されたリストを使いたい場合はデフォルト引数にリストを追加しない。
r = test_fun(100)
print(r)

r = test_fun(100)
print(r)




def test_fun2(x, l=None):
    if l is None:
        l = []
    l.append(x)
    return l

# デフォルト引数にリストではなくNoneを渡してあげる
r = test_fun2(100)
print(r)

r = test_fun2(100)
print(r)
