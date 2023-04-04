# 多重継承
# pra7

import datetime
class Animal:
    def __init__(self, birth):
        self.birth = birth

class Pet:
    def __init__(self, name):
        self.name = name

class MyNeko(Animal, Pet):
    def __init__(self, name, birth):
        Animal.__init__(self, birth)
        Pet.__init__(self, name)

birth = datetime.date(2012, 12, 25)
kiui = MyNeko('Kiui', birth)
print(kiui.name, kiui.birth)


# q7
class Animal2:
    def __init__(self, birth):
        self.birth = birth

class Pet2:
    def __init__(self, name):
        self.name = name
    def reply(self, name):
        if name == self.name:
            return self.name
        else:
            return f"I'm not {name}"

class MyNeko2(Animal2, Pet2):
    def __init__(self, name, birth):
        Animal2.__init__(self, birth)
        Pet2.__init__(self, name)

birth = datetime.date(2012, 12, 25)
kiui = MyNeko2('Kiui', birth)
print(kiui.reply('Yuzu'))
print(kiui.reply('Kiui'))


