"""
Implements decorator to cache func
"""
from functools import lru_cache
import time


def test(f):
    def _wrapper(n, m):
        print('before')
        r = f(n, m)
        print('after')
        return r
    return _wrapper

@test
def test(n, m):
    print('test')


def memorize(f):
    cache = {}
    def _wrapper(n):
        if n not in cache:
            cache[n] = f(n)
        return cache[n]
    return _wrapper

@memorize
def long_func(num: int) -> int:
    r = 0
    for i in range(10000000):
        r += num * i
    return r


if __name__ == '__main__':
    print(test(10, 4))

    for i in range(10):
        print(long_func(i))
    
    start = time.time()
    for i in range(10):
        print(long_func(i))
    print(time.time() - start)

    for i in range(5, 20):
        print(long_func(i))
    
    start = time.time()
    for i in range(5, 20):
        print(long_func(i))
    print(time.time() - start)