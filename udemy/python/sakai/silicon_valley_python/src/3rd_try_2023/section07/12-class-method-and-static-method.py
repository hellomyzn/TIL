class Person(object):
    kind = 'human'

    def __init__(self):
        self.x = 100

    @classmethod
    def what_is_your_kind(cls):
        return cls.kind

    @staticmethod
    def about(year):
        print(f'about human {year}')

Person.about(1999)

a = Person()
print(a.kind)
print(a.x)
print(a.what_is_your_kind())

b = Person
print(b.kind)
print(b.what_is_your_kind())
print(b.x)

