import numpy as np
import matplotlib.pyplot as plt

incomes = np.random.normal(100.0, 50.0, 10000)

plt.hist(incomes, 50, edgecolor="k")
plt.show()

"""
標準偏差と分散
"""

incomes.std()
incomes.var()

"""
アクティビティ
上記の正規関数に対して、様々なパラメータを試してみよう。そして、パラメータが正規関数の形に
どのような影響を与えるのか確かめる実験をしてみましょう。正規関数の形と、
標準偏差や分散にはどのような関係があるのでしょうか？
"""
