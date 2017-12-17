
from scipy.stats import norm, expon, binom, poisson
import numpy as np
import matplotlib.pyplot as plt


values = np.random.uniform(-10.0, 10.0, 100000)
plt.hist(values, 50, edgecolor="k")


"""
正規分布 / ガウシアン
確率密度関数を視覚化しましょう。
"""
x = np.arange(-3, 3, 0.001)
plt.plot(x, norm.pdf(x))

"""
正規分布に沿って乱数を発生させます。"mu"は設定する平均値です。”sigma”は標準偏差です。
"""

mu = 5.0
sigma = 2.0
values = np.random.normal(mu, sigma, 10000)
plt.hist(values, 50, edgecolor="k")

"""
指数確率密度関数 / "べき乗則"
"""
x = np.arange(0, 10, 0.001)
plt.plot(x, expon.pdf(x))

"""
二項確率質量関数
"""
n, p = 10, 0.5
x = np.arange(0, 10, 0.001)
plt.plot(x, binom.pmf(x, n, p))

"""
ポアソン確率質量関数
例: ウェブサイトの訪問者数が平均で一日５００人。５５０人になる確率は？
"""


mu = 500
x = np.arange(400, 600, 0.5)
plt.plot(x, poisson.pmf(x, mu))
