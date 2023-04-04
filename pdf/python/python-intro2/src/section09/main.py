# 列挙型(Enum)
# pra9

from enum import Enum
class Emotion(Enum):
    NORMAL = 0
    HAPPY = 1
    SAD = 2
    PANIC = 3

print(Emotion.NORMAL.value)

# q9_1
class Animal():
    def __init__(self):
        self._emotion = Emotion.NORMAL

    def get_emotion(self):
        return self._emotion

    def stroked(self):
        self._emotion = Emotion.HAPPY

    def look(self, obj):
        if type(self) == type(obj):
            self._emotion = Emotion.NORMAL
        else:
            self._emotion = Emotion.PANIC

class Neko(Animal):
    def __init__(self, name):
        super().__init__()
        self.__name = name
        self.memory = []

    def look(self, obj):
        if type(self) == type(obj):
            self._emotion = Emotion.NORMAL
        else:
            self._emotion = Emotion.PANIC

        if not obj in self.memory:
            self.memory.append(obj)

mikan = Neko('みかん')
print(mikan.get_emotion())
mikan.stroked()
print(mikan.get_emotion())


# q9_2
class Dog(Animal):
    def __init__(self):
        pass

pochi = Dog()
mikan.look(pochi)
print(mikan.get_emotion())
yuzu = Neko('Yuzu')
mikan.look(yuzu)
print(mikan.get_emotion())


# q9_3
print(mikan.memory)
hoge = Neko('Hoge')
mikan.look(hoge)
