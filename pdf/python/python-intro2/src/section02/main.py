# コンストラクタとフィールド

class Neko:
    family_name = '磯野家'
    def __init__(self, name, age):
        self.name = name
        self.age = age

tama = Neko('たま', 3)
mike = Neko('ミケ', 2)
kotetsu = Neko('虎徹', 1)

# q2
class Neko2:
    family_name = '磯野家'

    def __init__(self, name, age, type):
        self.name = name
        self.age = age
        self.type = type

tama = Neko2('たま', 3, '雑種')
mike = Neko2('ミケ', 2, '三毛')
kotetsu = Neko2('虎徹', 1, 'ペルシャ')
