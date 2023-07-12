def menu(food, *args, **kwargs):
    # for k, v in kwargs.items():
    #     print(k, v)
    print(food)
    print(args)
    print(kwargs)

l = (
    'apple',
    'orange'
)

d = {
    'entree': 'beef', 
    'drink': 'ice coffee', 
    'desert': 'ice', 
}

menu('banana', *l, **d)
