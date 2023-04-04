# 単一継承
# pra6
class Animal:
    def __init__(self, age):
        self.age = age

class Neko(Animal):
    def __init__(self, age):
        super().__init__(age)
        self.name = name

# q6
class Animal2:
    def __init__(self, age):
        self.__age = age

    @property
    def age(self):
        return self.__age

    @age.setter
    def age(self, age):
        self.__age = age

class Neko2(Animal2):
    def __init__(self, name, age):
        super().__init__(age)
        self.__name = name

    @property
    def name(self):
        return self.__name

    @name.setter
    def name(self, name):
        self.name = self.__name

cat = Neko2("kitty", 3)
print(cat.name)
print(cat.age)
