
class Car(object):
    """Car"""
    def __init__(self, model=None):
        self.model = model

    def run(self):
        print('run')


class ToyotaCar(Car):
    """Car"""
    pass


class TeslaCar(Car):
    """Car"""
    def __init__(self, model='Model S', is_auto_run=False):
        super().__init__(model)
        self.is_auto_run = is_auto_run

    def run(self):
        print('super fast')

    def auto_run(self):
        print('auto run')


car = Car()
car.run()
print('###################')
tyt_car = ToyotaCar('Lexus')
print(tyt_car.model)
tyt_car.run()
print('###################')
tsl_car = TeslaCar('Model S')
print(tsl_car.model)
tsl_car.run()
tsl_car.auto_run()
