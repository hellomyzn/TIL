import pandas as pd
import numpy as np
import matplotlib.pyplot as plt
import seaborn as sns
from pandas import Series, DataFrame
from pandas_datareader import DataReader
from datetime import datetime
from IPython.display import SVG
from __future__ import division
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

AAPL['Daily Return'].hist(bins=100, edgecolor="k")
plt.show()

closing_df = DataReader(['AAPL', 'GOOG', 'MSFT', 'AMZN'],
                        'yahoo',
                        start,
                        end)['Adj Close']

closing_df.head()

tech_rets = closing_df.pct_change()
tech_rets.head()

sns.jointplot('GOOG',
              'GOOG',
              tech_rets,
              kind="scatter",
              color="seagreen",
              edgecolor="k")

plt.show()

sns.jointplot('GOOG', 'MSFT', tech_rets, kind="scatter")
plt.show()

"""
2つの会社の株価の変化率は相当関係があることがわかります。pearsonrは相関係数
(正確には、ピアソン積率相関係数）ですが、0.52と正に相関していることを示しています。
url - https://ja.wikipedia.org/wiki/%E7%9B%B8%E9%96%A2%E4%BF%82%E6%95%B0
相関係数について、感覚的な理解を助けてくれる図を紹介しておきます。


SVG(url='http://upload.wikimedia.org/wikipedia/\
    commons/d/d4/Correlation_examples2.svg')
"""


sns.pairplot(tech_rets.dropna())
plt.show()

returns_fig = sns.PairGrid(tech_rets.dropna())
returns_fig.map_upper(plt.scatter, color="purple", edgecolor="k")
returns_fig.map_lower(sns.kdeplot, color='cold_d')
returns_fig.map_diag(plt.hist, bins=20, edgecolor="k")
plt.show()


returns_fig = sns.PairGrid(closing_df)
returns_fig.map_upper(plt.scatter, color="purple", edgecolor="k")
returns_fig.map_lower(sns.kdeplot, color='cold_d')
returns_fig.map_diag(plt.hist, bins=20, edgecolor="k")
plt.show()
sns.heatmap(tech_rets.corr(), annot=True)
plt.show()
tech_rets.corr()
"""
相関係数を表示したヒートマップを描くこともできます。

すべてのハイテク企業の株価の変動は、正の相関を示していることは驚きです。
次は、リスクを管理するためのデータ解析について学んでいきましょう。
"""


"""
リスク解析¶
株式投資のリスクを測る方法にはいろいろありますが、折角日々の変化率が分かっているので、
この変化率の変動を計算して、リスクを見積もってみることにします。
"""

rets = tech_rets.dropna()
rets.head()
plt.scatter(rets.mean(), rets.std(), alpha=0.5, s=np.pi * 20)

plt.xlim([-0.003, 0.0001])
plt.ylim([0.005, 0.015])

plt.xlabel('Expected returns')
plt.ylabel('Risk')

# グラフにアノテーションを付けます。詳しくは、以下を参照してみてください。
# http://matplotlib.org/users/annotations_guide.html
for label, x, y in zip(rets.columns, rets.mean(), rets.std()):
    plt.annotate(
        label,
        xy=(x, y), xytext=(0, 20),
        textcoords='offset points', ha='right', va="bottom",
        arrowprops=dict(arrowstyle='-', connectionstyle='arc3'))
plt.show()


"""
Value at Risk
ある一定の確率で、資産がどれくらい減ってしまう可能性があるのかを見積もる方法に、
Value at Risk（VaR）という考え方があります。このValue at Riskの計算方法にもいくつかの
方法がありますが、ここではまず、Value at Riskの考え方から説明し、実際に数字を見積もってみます。
"""


sns.distplot(AAPL['Daily Return'].dropna(),
             bins=100,
             color="purple",
             hist_kws={"edgecolor": "k"})
plt.show()

rets['AAPL'].quantile(0.05)


"""
5パーセンタイルの位置にある変動率は、-2.7%です。これは、95%の可能性で、
日々の変動率がこれを下回らないことを意味します。つまり、1億円持っていたら、5%VaRは、
2.7%＊1億円で、270万円です。これが、VaRの考え方です。この95％を信頼区間ということもあります。

このVaRを、未来の株価を仮想的に作り出すことによって見積もることができます。ここで使われるのが、
ブラウン運動モデルとモンテカルロ（Monte Carlo）法です。それぞれどのようなものなのか、
少し詳しく説明します。

Value at Riskをシミュレーションで計算する
未来のことは誰も分かりません。それは株価も同じ事です。ただ、これまでの経験と身につけた常識から、
未来に起こり得ることを予測することは可能です。昨日まで300円だったとある会社の株価が3万円に
なることはあり得ません。このように、株価の予測は、これまでの価格と、取り得る値の範囲を
考える事で、ある程度モデル化することができます。

色々なモデルが提案されていますが、もっとも簡単なものの1つに、ブラウン運動モデルがあります。
ブラウン運動はもともと、水の中を花粉がランダムに動く現象から名付けられたものです。
水に浮いた花粉は、今いる場所からランダムに次の場所に移動します。このとき、
少ししか動かないこともあれば、かなりの距離動くこともあるでしょう。これはランダムな現象ですが、
移動距離はこれまでの平均的な移動距離に依存します。これをモデル化したものが、
ブラウン運動モデルです。

ブラウン運動モデル（正確には geometric Brownian motion (GBM)）は、
確率微分方程式としてモデル化されるので、すべてを理解しようとすると、ちょっと面倒です。
ポイントとしては、今いる場所にこれまでの情報が集約されていて、次の１歩は、この場所を基準に、
すこしランダム性が入って決まるという点でしょう。これをマルコフ過程といったりします。
それはさておき、次の式が、株価のモデルに使われる式です。

ΔS/S = μΔt + σϵ√Δt

Sは株価、μは平均的な変動の値、σはその標準偏差です。tは時間なのでΔtは時間の間隔、εはランダムな値です。
両辺にSを掛けると、次のように変形出来ます。

ΔSS = S(μΔt + σϵ√Δt)

右辺の最初の項はドリフト（drift）、２つ目の項はショック（shock）と呼ばれます。
ドリフトはこれまでの平均と時間間隔のかけ算なので、全体的なズレを表現し、
ショックは次の瞬間どちら向きに移動するかを表現しています。

εはランダムな数字ですので、このモデルを使って株価をシミュレーションするには、
ランダムな値を次々に発生させる必要があります。こうした手法を、
モンテカルロ法と言うことがあります。ここでは、実際にブラウン運動モデルとモンテカルロ法を使って、
株価のシミュレーションをやってみることにしましょう。

参考資料：
ブラウン運動
https://ja.wikipedia.org/wiki/%E3%83%96%E3%83%A9%E3%82\
    %A6%E3%83%B3%E9%81%8B%E5%8B%95
モンテカルロ法
https://ja.wikipedia.org/wiki/%E3%83%A2%E3%83%B3\
    %E3%83%86%E3%82%AB%E3%83%AB%E3%83%AD%E6%B3%95

Google社の株価を使って、モンテ・カルロ法の基本的な使い方を体験してみます。
"""
# 1年を基準にします。
days = 365

# 1日分の差分です。 デルタT
dt = 1 / days

# 日々の変動の平均を計算します。　平均値
mu = rets.mean()['GOOG']

# ボラティリティ（volatility：株価の変動の振れ幅）を変動の標準偏差で計算します。　標準偏差
sigma = rets.std()['GOOG']


def stock_monte_carlo(start_price, days, mu, sigma):
    ''' この関数は、シミュレーションの結果の価格リストを返します。'''

    # 戻り値となる価格のリストを返します。
    price = np.zeros(days)
    price[0] = start_price
    # Shock と Driftです。
    shock = np.zeros(days)
    drift = np.zeros(days)

    # 指定された日数のところまで、計算します。
    for x in range(1, days):
        #  shockを計算します
        shock[x] = np.random.normal(loc=mu * dt, scale=sigma * np.sqrt(dt))
        # Driftを計算します。
        drift[x] = mu * dt
        # これらを使って価格を計算します。
        price[x] = price[x - 1] + (price[x - 1] * (drift[x] + shock[x]))

    return price


GOOG.head()
GOOG.iloc[0, 5]

start_price = GOOG.iloc[0, 5]
for run in range(5):
    plt.plot(stock_monte_carlo(start_price, days, mu, sigma))
plt.xlabel("Days")
plt.ylabel("Price")
plt.title('Monte Carlo Analysis for Google')
plt.show()


# 回数を指定します。
runs = 10000

# 結果を保持するarrayです。
simulations = np.zeros(runs)

# これは、表示のオプションです。
np.set_printoptions(threshold=5)

for run in range(runs):
    # 最終的な値をシミュレーション結果として保持します。
    simulations[run] = stock_monte_carlo(
        start_price, days, mu, sigma)[days - 1]

# 10000個の最終的なシミュレーション結果のヒストグラムです。
plt.hist(simulations, bins=200, edgecolor="k")

plt.show()

# 最終的な株価のヒストグラムを表示します。
plt.hist(simulations, bins=200)

# 1パーセンタイルの位置を設定します。
q = np.percentile(simulations, 1)

# プロットに追加的な情報を載せます。

# 最初の株価
plt.figtext(0.6, 0.8, s="Start price: {:0.2f}".format(start_price))
# 最終的な株価の平均値
plt.figtext(0.6, 0.7, "Mean final price: {:0.2f}".format(simulations.mean()))

# Value at Risk (信頼区間99%）
plt.figtext(0.6, 0.6, "VaR(0.99): {:0.2f}".format(start_price - q))

# 1パーセンタイル
plt.figtext(0.15, 0.6, "q(0.99): {:0.2f}".format(q))

# 1% クォンタイルに線を描きます
plt.axvline(x=q, linewidth=4, color='r')

# タイトル
plt.title("Final price distribution for Google Stock after {} days".format(
    days), weight='bold')
plt.show()

"""

シミュレーションで、グーグルの株価のVaRを計算することができました。1年という期間、
99%の信頼区間でのVaRは、1株（526.4ドル）あたり、18.38ドルであることがわかります。
99%の可能性で、損失はこれ以内に収まる計算になるわけです。
お疲れ様でした。ひとまず、株価のデータ解析を終えることができました。
追加の課題をいくつか考える事ができます。

1.) このレクチャーで学んだVaRを計算する2つの方法を、ハイテク株では無い銘柄に適用してみましょう。
2.) 実際の株価でシミュレーションを行い、リスクの予測やリターンについて検証してみましょう。
    過去のデータから現在の株価を予測することで、これが出来るはずです。
3.) 関連のある銘柄同士の値動きに注目してみましょう。ペアトレードという投手法が実際にありますが、
    ここに繋がる知見を得られるかも知れません
"""
