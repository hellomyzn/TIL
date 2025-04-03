import numpy as np
import matplotlib.pyplot as plt

#
# x = np.arange(30)
# print(x)
#
# a = 3
# y = a * x
# print(y)
#
# plt.xlim(x.min(),x.max())
# plt.ylim(y.min(),y.max())
# plt.plot(x,y)
# plt.show()

x = np.linspace(start=1, stop=50, num=100)
y = np.linspace(start=1, stop=50, num=100)
# print(x,"\n",y)

np.random.shuffle(x)
# print(x)

plt.scatter(x, y, c="red", marker="^")
plt.show()
