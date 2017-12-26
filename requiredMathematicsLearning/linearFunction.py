import matplotlib.pyplot as plt
import numpy as np

x = np.arange(-5, 15, 0.1)
print(x)

# y = 2x + 1
# y = 2 * x + 1
# y = x^2 + 10x + 10
# y = x**2 - 10*x + 10

y = x**3 - 10 * x**2 - 10 * x + 10
print(y)

plt.plot(x, y)
plt.show()
