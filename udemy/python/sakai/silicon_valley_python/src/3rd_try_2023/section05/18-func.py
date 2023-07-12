def say_something():
    print('hi')
    s = 'hi'
    return s

say_something()
print(type(say_something))
f = say_something
f()

result = say_something()
print(result)

def what_is_this(color):
    if color == 'red':
        return 'tomato'
    elif color == 'green':
        return 'green papper'
    else:
        return "I don't know"

r = what_is_this('red')
print(r)
