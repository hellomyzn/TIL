def print_info(func):
    def wrapper(*args, **kwargs):
        print('start')
        r = func(*args, **kwargs)
        print('end')
        return r
    return wrapper

def add_num(a, b):
    return a + b

f = print_info(add_num)
r = f(10, 20)
print(r)
