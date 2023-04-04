# プロパティ

# ra4
class Neko:
    def __init__(self):
        self.__name = 'キティ'

    @property
    def name(self):
        return self.__name

    @name.setter
    def name(self, name):
        self.__name = name

kiui = Neko()
kiui.name = 'キウイ'
print(kiui.name)

# q4
class Neko2:
    def __init__(self):
        self.__name = 'キティ'
        self.__age = 0
        self.__type = '三毛'

    @property
    def name(self):
        return self.__name
    @property
    def age(self):
        return self.__age
    @property
    def type(self):
        return self.__type

    @name.setter
    def name(self, name):
        self.__name = name
    @age.setter
    def age(self, age):
        self.__age = age
    @type.setter
    def type(self, type):
        self.__type = type

kiui = Neko2()
kiui.name = 'キウイ'
kiui.age = 4
kiui.type = '雑種'

print(kiui.name)
print(kiui.age)
print(kiui.type)
