class Car(object):
    def run(self):
        print('run')


class ToyotaCar(Car):
    pass


class TeslaCar(Car):
    def auto_run(self):
        print('auto run')


car = Car()
car.run()
print('###################')
tyt_car = ToyotaCar()
tyt_car.run()
print('###################')
tsl_car = TeslaCar()
tsl_car.run()
tsl_car.auto_run()
