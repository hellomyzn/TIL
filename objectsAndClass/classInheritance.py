class Person(object):
    def __init__(self, age=1):
        self.age = age

    def drive(self):
        if self.age >= 18:
            print('ok')
        else:
            raise Exception("No, Drive")


class Baby(Person):
    def __init__(self, age=1):
        if age < 18:
            super().__init__(age)
        else:
            raise ValueErrors


class Adult(Person):
    def __init__(self, age=18):
        if age >= 18:
            super().__init__(age)
        else:
            raise ValueErrors


baby = Baby()
adult = Adult()


class Car(object):
    def __init__(self, model=None):
        self.model = model

    def run(self):
        print("run")

    def ride(self, person):
        person.drive()


car = Car()
car.ride(adult)


class ToyotaCar(Car):
    pass


class TeslaCar(Car):
    def __init__(self, model="Model S", enable_auto_run=False, passwd="123"):

        super().__init__(model)
        self._enable_auto_run = enable_auto_run
        self.passwd = passwd

    @property
    def enable_auto_run(self):
        return self._enable_auto_run

    @enable_auto_run.setter
    def enable_auto_run(self, is_enable):
        if self.passwd == "456":
            self._enable_auto_run = is_enable
        else:
            raise ValueError

    def run(self):
        print("super run")

    def auto_run(self):
        print("auto run")


car = Car()
car.run()

print("###################")

toyota_car = ToyotaCar("Lexus")
print(toyota_car.model)
toyota_car.run()

print("###################")

tesla_car = TeslaCar("Model S", passwd="456")
print(tesla_car.model)
tesla_car.run()
tesla_car.auto_run()


print("###################")
tesla_car.enable_auto_run = True
print(tesla_car.enable_auto_run)


class T(object):
    pass


t = T()
t.name = "Mike"
t.age = 20
pprint(t.name, t.age)
