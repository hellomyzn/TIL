animal = 'cat'

def f():
    """e.g."""
    global animal
    print(animal)
    animal = 'dog'
    print('after', animal)

f()
print('global: ', animal)
print(globals())
