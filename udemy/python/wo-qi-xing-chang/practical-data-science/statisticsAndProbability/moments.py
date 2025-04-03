"""
モーメント: 平均、分散、歪度、尖度
ほぼ正規分布のランダムなデータセットを用意します。
"""
import scipy.stats as sp
import numpy as np
import matplotlib.pyplot as plt

vals = np.random.normal(0, 0.5, 10000)

plt.hist(vals, 50, edgecolor="k")

"""
一次のモーメントは”平均”。データの平均値は０に近くなる。
"""
np.mean(vals)
"""
二次のモーメントは”分散”。
"""
np.var(vals)

"""
三次のモーメントは”歪度”。今回のデータは０を中心とした対称に近いので、歪度はほぼ０となる。
"""
sp.skew(vals)
"""
四次のモーメントは”尖度”。ピークの鋭さを表す。大きいほど鋭い。
"""
sp.kurtosis(vals)
