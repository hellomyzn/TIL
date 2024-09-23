import numpy as np
import matplotlib.pyplot as plt
from pylab import *
from scipy import stats


"""
ページの表示速度と購入量の関係を線形に示すデータを作りましょう。
"""

pageSpeeds = np.random.normal(3.0, 1.0, 1000)
pA = np.random.normal(0, 0.1, 1000)
pageSpeeds
pA
purchaseAmount = 100 - (pageSpeeds + pA) * 3

scatter(pageSpeeds, purchaseAmount)

"""
二つしか特徴量がないので、scipy.state.linregressを使ってシンプルに行きましょう
"""

slope, intercept, r_value, p_value, std_err = stats.linregress(
    pageSpeeds, purchaseAmount)
hogehoge = stats.linregress(pageSpeeds, purchaseAmount)
hogehoge

"""
驚くべきことではないのですが、R-2乗値がよいフィットを示しています。
"""

r_value ** 2
"""
この回帰の傾きと切片を用いて、直線を描画してみましょう。
"""


def predict(x):
    return slope * x + intercept


fitLine = predict(pageSpeeds)

plt.scatter(pageSpeeds, purchaseAmount)
plt.plot(pageSpeeds, fitLine, c='r')
