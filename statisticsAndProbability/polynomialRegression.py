"""
多項式回帰

実際のデータは、線形でない場合も多いです。多項式回帰を用いて、より現実に即したページ速度と購入量のデータを見ていきましょう。
"""

from pylab import *
import numpy as np
import matplotlib.pyplot as plt
from sklearn.metrics import r2_score

np.random.seed(2)
pageSpeeds = np.random.normal(3.0, 1.0, 1000)
purchaseAmount = np.random.normal(50.0, 10.0, 1000) / pageSpeeds

scatter(pageSpeeds, purchaseAmount)

"""
numpyは簡単に使える多項式回帰の関数を持っています。 n次の多項式で、
二乗誤差が最小になるようにフィッティングをしてみましょう。今回は4次の多項式を用います。

"""

x = np.array(pageSpeeds)
y = np.array(purchaseAmount)

p4 = np.poly1d(np.polyfit(x, y, 4))

p4
a = np.polyfit(x, y, 4)
a
b = np.poly1d(a)
b
p4(x)

"""
散布図とともに、ページ速度0-7の範囲で多項式を表示します。
"""

xp = np.linspace(0, 7, 100)
plt.scatter(x, y)
plt.plot(xp, p4(xp), c='r')

"""
とてもよくフィットできていますね。R-二乗値を測定してみましょう。
"""
c = r2_score([1, 2], [1, 2])
c
r2 = r2_score(y, p4(x))

print(r2)
