import pandas as pd
import numpy as np
import matplotlib.pyplot as plt
import seaborn as sns
from pandas import Series, DataFrame
from pandas_datareader import DataReader
from datetime import datetime
# from __future__ import division
sns.set_style("whitegrid")

"""
株式市場のデータ解析
株のデータを解析して、未来の株価が分かったら大金持ちになれるかも知れません。
それはさておき、Pythonと周辺ライブラリを使うと、株価データのような、
時系列データの解析も比較的簡単に行う事ができます。
次のような課題について考えて行くことにしましょう。
1.) 株価の時間による変化を見てみる。
2.) 日ごとの変動を可視化する。
3.) 移動平均を計算する
4.) 複数の株価の終値の相関を計算する
4.) 複数の株価の変動の関係を見る
5.) 特定の株のリスクを計算する
6.) シミュレーションを使った未来の予測
株価データの基本
pandasを使って株価のデータを扱う基本を学んで行きましょう。
"""

tech_list = ['AAPL', 'GOOG', 'MSFT', 'AMZN']
end = datetime.now()
datetime.now()
start = datetime(end.year - 1, end.month, end.day)


for stock in tech_list:
    globals()[stock] = DataReader(stock, 'yahoo', start, end)

"""
Open 市場が空いた時の初値
High １日の取引の中で高かった価格
Low 1日の取引の中で低かった価格
Close その日の取引の終値
Adj Close 調整した終値
Volume　出来高、どれくらい取引が成立したか
"""
GOOG.head()
AAPL.head()
AAPL.describe()
AAPL['Adj Close'].plot(legend=True, figsize=(10, 4))
plt.show()

AAPL['Volume'].plot(legend=True, figsize=(10, 4))
plt.show()
"""
単純な折れ線グラフではなく、
移動平均線（moving average）と呼ばれるなめらかなグラフを描いてみましょう。

参考資料
1.) https://ja.wikipedia.org/wiki/%E7%A7%BB%E5%8B%95%E5%B9%B3%E5%9D%87
2.) http://www.investopedia.com/articles/active-trading/
    052014/how-use-moving-average-buy-stocks.asp
"""

moovingAverage_day = [10, 20, 50]
for ma in moovingAverage_day:
    column_name = "MA{}".format(str(ma))
    AAPL[column_name] = pd.rolling_mean(AAPL['Adj Close'], ma)
AAPL.head()
AAPL[['Adj Close', 'MA10', 'MA20', 'MA50']].plot(figsize=(10, 4))
plt.show()

"""
Section 2 - 株価と日ごとの変動
株式投資のリスクを管理するために、日ごとの変動について計算してみます。
"""


AAPL['Daily Return'] = AAPL['Adj Close'].pct_change()

AAPL.head()

AAPL['Daily Return'].plot(figsize=(10, 4),
                          legend=True,
                          linestyle="--",
                          marker="o")
plt.show()

sns.distplot(AAPL["Daily Return"].dropna(),
             bins=100,
             color="purple",
             hist_kws={"edgecolor": "k"})
plt.show()
