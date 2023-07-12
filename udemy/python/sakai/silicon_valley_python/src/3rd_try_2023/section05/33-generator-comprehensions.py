def g():
    for i in range(10):
        yield i


g = g()
print(type(g))
print(next(g))
print(next(g))
print(next(g))
print(next(g))
print(next(g))
print(next(g))
print(next(g))

g = tuple(i for i in range(10))
print(type(g))

g = (i for i in range(10) if i % 2 == 0)
for x in g:
    print(x)
