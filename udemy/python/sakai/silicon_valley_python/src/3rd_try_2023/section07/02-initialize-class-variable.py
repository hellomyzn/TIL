class Person(object):
    def __init__(self, name):
        self.name = name
        print(self.name)

    def say_something(self):
        print(f'I am {self.name}. hello')

    def run(self, num):
        print('run' * num)


person = Person('Mike')
person.say_something()
person.run(4)
