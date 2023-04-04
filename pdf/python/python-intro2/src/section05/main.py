# メソッド
# pra5
class Neko:
    def __init__(self):
        self.__voice = "ミャー"
    def meow(self):
        return self.__voice

tama = Neko()
print(tama.meow())


# q5
class Neko2:
    def __init__(self):
        self.__voice = "Meow"
        self.is_sleep = False

    def meow(self):
        return self.__voice

    def sleep(self):
        self.is_sleep = True
        self.__voice = "Zzz"

    def wakeup(self):
        self.is_sleep = False
        self.__voice = "Meow"

tama = Neko2()
tama.sleep()
print(tama.meow())
tama.wakeup()
print(tama.meow())
