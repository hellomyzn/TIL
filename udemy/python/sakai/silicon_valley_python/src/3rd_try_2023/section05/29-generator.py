l = ['Good morning', 'Good afternoon', 'Good night']

for i in l:
    print(i)


print("#########################")


def greeting():
    """ e.g. """
    yield 'Good morning'
    yield 'Good afternoon'
    yield 'Good night'


def counter(num=10):
    """ e.g. """
    for _ in range(num):
        yield 'run'


for g in greeting():
    print(g)


g = greeting()
c = counter()
print(next(g))
print(next(c))
print(next(c))
print(next(c))
print(next(c))
print(next(c))
print(next(g))
print(next(c))
print(next(c))
print(next(c))
print(next(c))
print(next(c))
print(next(g))
