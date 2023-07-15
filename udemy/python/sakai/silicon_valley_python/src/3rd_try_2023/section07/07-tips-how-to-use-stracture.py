

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

    def __init__(self, model='Model S', is_auto_run=False, passwd='123'):
        super().__init__(model)
        self.__is_auto_run = is_auto_run
        self.passwd = passwd

    @property
    def is_auto_run(self):
        return self.__is_auto_run

    @is_auto_run.setter
    def is_auto_run(self, status):
        if self.passwd == '456':
            self.__is_auto_run = status

    def run(self):
        print(self.__is_auto_run)
        print('super fast')

    def auto_run(self):
        print('auto run')


tsl_car = TeslaCar('Model S', passwd='456')
print(tsl_car.is_auto_run)
tsl_car.is_auto_run = True
tsl_car.run()
