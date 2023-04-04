# オーバーライド
# pra8

class Animal:
    def say(self):
        return 'ワン'

class Neko(Animal):
    def say(self):
        return 'ミャー'

mikan = Neko()
print(mikan.say())

# 抽象クラス
from abc import ABCMeta, abstractmethod
class MyABC(metaclass=ABCMeta):
    @abstractmethod
    def print_abc(self):
        pass

class Animal(metaclass=ABCMeta):
    @abstractmethod
    def talk(self):
        pass

class Dog(Animal):
    def talk(self):
        print('きゃんきゃん')

class Cat(Animal):
    def talk(self):
        print('にゃお')


pet = [Dog(), Cat()]
for animal in pet:
    animal.talk()

# 特殊メソッド
import copy
class Book:
    master_isbn = 0
    def __init__(self, title):
        Book.master_isbn += 100
        self.isbn = Book.master_isbn
        self.title = title

    def __repr__(self) -> str:
        return 'ISBN ' + str(self.isbn) + ' ' + self.title

    def __eq__(self, other):
        return self.isbn == other.isbn

    def __add__(self, other):
        book = Book(self.title + ',' + other.title)
        return book

book1 = Book('Python Intro')
# call __repr__
print(book1)

book2 = copy.copy(book1)
print(book1 == book2)
book3 = Book('Python Exercise')
# call __eq__
print(book1 == book3)
print(book1.isbn, book3.isbn)

magazine = book1 + book3 + book2
print(magazine)


# 列挙型
from enum import Enum
class State(Enum):
    STOP = 1
    PLAY = 2
print(State.STOP)
print(State.STOP.name)
print(State.STOP.value)

for s in State:
    print(s)

class ErrorCode(Enum):
    '''エラー定義'''
    VALUE_OVER = (1000, '値が規定値を超えています。')
    VALUE_UNDEFINED = (1100, '値は未定義です。')
error = ErrorCode.VALUE_OVER
print(error)
print(error.value[1])
