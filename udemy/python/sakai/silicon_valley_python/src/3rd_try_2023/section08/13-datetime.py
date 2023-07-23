import os
import shutil
import time
import datetime

now = datetime.datetime.now()
print(now)

print(now.isoformat())
print(now.strftime('%d/%m/%y-%H%M%Sf'))

today = datetime.datetime.today()
print(today)
print(today.isoformat())
print(today.strftime('%d/%m/%y'))

t = datetime.time(hour=1, minute=10, second=5, microsecond=100)
print(t)
print(t.isoformat())
print(t.strftime('%H_%M_%S_%f'))

print(now)
d = datetime.timedelta(weeks=1)
print(now - d)
d = datetime.timedelta(days=1)
print(now - d)
d = datetime.timedelta(hours=1)
print(now - d)
d = datetime.timedelta(minutes=1)
print(now - d)
d = datetime.timedelta(seconds=1)
print(now - d)
d = datetime.timedelta(microseconds=1)
print(now - d)

time.sleep(3)
print('###')

print(time.time())


file_name = 'text.txt'
if os.path.exists(file_name):
    shutil.copy(file_name, f"{file_name}.{now.strftime('%Y_%m_%d_%H_%M_%S')}")

with open(file_name, 'w') as f:
    f.write('test')
