"""
外れ値の扱い
しばしば、外れ値は分析の邪魔になります。少数の外れ値が、
結果全体をゆがませるのは望ましくありません。久しぶりに、
大富豪を混ぜた収入分布のデータを作りましょう。
"""

import numpy as np

incomes = np.random.normal(27000, 15000, 10000)
incomes = np.append(incomes, [1000000000])

import matplotlib.pyplot as plt
plt.hist(incomes, 50)


"""
これを見ても何もわかりませんね。一人の大富豪が、
ヒストグラム上においてその他の人々を一本の線に押し込めてしまいました。その上、
収入の平均までおかしくしています。
"""
