import numpy as np
import pandas as pd
import datetime
import webbrowser
import matplotlib.pyplot as plt
import seaborn as sns
from pandas_datareader import data as pdweb
from pandas import Series, DataFrame
from numpy.random import randn
from numpy import nan
# numpy.arrayに似たSeriesをつくります。違いは、データにラベルがあるところ
obj = Series([3, 6, 9, 12])
obj
# valuesで、値が返ってくる
obj.values
# indexを表示
obj.index
# index付きのデータを作る
# 第二次世界大戦の死傷者
ww2_cas = Series([8700000, 4300000, 3000000, 2100000, 400000], index=[
                 'USSR', 'Germany', 'China', 'Japan', 'USA'])
ww2_cas
# 文字列のindexでアクセスできる。
ww2_cas['USA']
# 400万人以上の死傷者を出したのは？
ww2_cas[ww2_cas > 4000000]
# 普通の辞書のように扱えます。
# USSR があるか？
'USSR' in ww2_cas
# 辞書型に変換できます。
ww2_dict = ww2_cas.to_dict()
ww2_dict
# 辞書をもとに、Seriesを作ることができます。
WW2_Series = Series(ww2_dict)
WW2_Series
# indexを明示的に与えることができます。たとえば・・・
countries = ['China', 'Germany', 'Japan', 'USA', 'USSR', 'Argentina']
# 別のSeriesを作ります
obj2 = Series(ww2_dict, index=countries)
obj2
# nullデータがあるかどうかを確認できます
pd.isnull(obj2)
# 逆のこともできます。
pd.notnull(obj2)
# もとのデータに戻りましょう。
WW2_Series
obj2
# 両方のデータを足すと、pandasが自動的に、indexでまとめてくれます。
WW2_Series + obj2
# Seriesに名前を付けられます。
obj2.name = '第二次世界大戦の死傷者'
# Python2の場合は、uが必要です。
obj2
# indexに名前を付けることも可能
obj2.index.name = 'Countries'
obj2


# NFLのデータをサンプルとして使います。
website = 'http://en.wikipedia.org/wiki/NFL_win-loss_records'
webbrowser.open(website)
nfl_frame = pd.read_clipboard()
nfl_frame

# 列（カラム）の名前が.columnsでわかります。
nfl_frame.columns
nfl_frame['First NFL Season']
# オブジェクトの属性のような書き方も可能
nfl_frame.Team
# 特定のカラムで新しいDataFrameを作る
DataFrame(nfl_frame, columns=['Team', 'First Season', 'Total Games'])
DataFrame(nfl_frame, columns=[
          'Team', 'First Season', 'Total Games', 'Stadium'])
# 先頭だけを表示
nfl_frame.head()
# 最後だけを表示
nfl_frame.tail()
# indexを使って、行を取り出せる
nfl_frame.ix[3]
# 列全体に値を代入
nfl_frame['Stadium'] = "Levi's Stadium"  # 文字列内に「'」があるので、全体は「”」で囲む
nfl_frame
# 長さが合っていれば、列への代入が可能。
nfl_frame["Stadium"] = np.arange(10)
nfl_frame
# SeriesをDataFrameに追加する
stadiums = Series(["Levi's Stadium", "AT&T Stadium"], index=[4, 0])
stadiums

nfl_frame['Stadium'] = stadiums
nfl_frame
# 列を消すことも可能
del nfl_frame['Stadium']
nfl_frame
# 辞書からDataFramesを作ることもできます。
data = {'City': ['SF', 'LA', 'NYC'],
        'Population': [837000, 3880000, 8400000]}
city_frame = DataFrame(data)
# Show
city_frame
# pandas.DataFrameの機能の全体は、Webで確認できます。
website =\
    'http://pandas.pydata.org/pandas-docs/dev/generated/pandas.DataFrame.html'
webbrowser.open(website)


my_ser = Series([1, 2, 3, 4], index=['A', 'B', 'C', 'D'])
my_index = my_ser.index
my_index
my_index[2]
my_index[2:]
# シリーズのインデックスは書き換え不可
my_index[0] = '2'


ser1 = Series([1, 2, 3, 4], index=['A', 'B', 'C', 'D'])
ser1

ser2 = ser1.reindex(['A', 'B', 'C', 'D', 'E', 'F'])
ser2

ser2.reindex(['A', 'B', 'C', 'D', 'E', 'F', 'G'], fill_value=0)
ser3 = Series(
    ['USA', 'Mexico', 'Canada'],
    index=[0, 5, 10])
ser3
# ffillは、forward fillの略です。
ser3.reindex(range(15), method='ffill')
# 行と列の両方について、Reindexを考えます。
# reshapeを使ってDataFrameを作ってみます。
dframe = DataFrame(
    randn(25).reshape((5, 5)),
    index=['A', 'B', 'D', 'E', 'F'],
    columns=['col1', 'col2', 'col3', 'col4', 'col5'])
dframe
hogehoge = DataFrame(
    randn(25).reshape((5, 5)),
    index=['A', 'B', 'D', 'E', 'F'],
    columns=['col1', 'col2', 'col3', 'col4', 'col5'])


# Cを忘れました。
new_index = ['A', 'B', 'C', 'D', 'E', 'F']
hogehoge = hogehoge.reindex(new_index)
hogehoge

new_columns = ['col1', 'col2', 'col3', 'col4', 'col5', 'col6']
hogehoge.reindex(columns=new_columns)
dframe
dframe.ix[new_index, new_columns]


ser1 = Series(np.arange(3), index=['a', 'b', 'c'])
ser1
ser1.drop('b')
dframe1 = DataFrame(np.arange(9).reshape((3, 3)),
                    index=['SF', 'LA', 'NY'], columns=['pop', 'size', 'year'])
dframe1
dframe1.drop('LA')
dframe1.drop('year', axis=1)


ser1 = Series(np.arange(3), index=['A', 'B', 'C'])
ser1 = 2 * ser1
ser1


ser1['B']
ser1[1]
ser1[0:3]
ser1[['A', 'B', 'C']]
ser1[ser1 > 3]
ser1[ser1 > 3] = 10
ser1

dframe = DataFrame(np.arange(25).reshape((5, 5)),
                   index=['NYC', 'LA', 'SF', 'DC', 'Chi'],
                   columns=['A', 'B', 'C', 'D', 'E'])
dframe
dframe[['B', 'E']]

dframe[dframe['C'] > 8]
dframe > 10
dframe.ix['LA']
dframe.ix[2]


ser1 = Series([0, 1, 2], index=['A', 'B', 'C'])
ser1
ser2 = Series([3, 4, 5, 6], index=['A', 'B', 'C', 'D'])
ser2
ser1 + ser2
dframe1 = DataFrame(
    np.arange(4).reshape(2, 2),
    columns=list('AB'),
    index=['NYC', 'LA'])
dframe1
dframe2 = DataFrame(
    np.arange(9).reshape(3, 3),
    columns=list('ADC'),
    index=['NYC', 'SF', 'LA'])
dframe2
dframe1 + dframe2
dframe1.add(dframe2)
ser3 = dframe2.ix[0]
ser3
dframe2 - ser3

ser1 = Series(range(3), index=['C', 'A', 'B'])
ser1

ser1.sort_index()
ser1.sort_values()

ser2 = Series(randn(10))
ser2


arr = np.array([[1, 2, np.nan], [np.nan, 3, 4]])
arr
dframe1 = DataFrame(arr, index=['A', 'B'], columns=['one', 'two', 'three'])
dframe1
dframe1.sum(axis=1)
dframe1.min(axis=1)
dframe1.idxmin(axis=0)
dframe1
dframe1.cumsum()
dframe.cumsum()

prices = pdweb.get_data_yahoo(['CVX', 'XOM', 'BP'],
                              start=datetime.datetime(2010, 1, 1),
                              end=datetime.datetime(2013, 1, 1))['Adj Close']
prices.head()

valume = pdweb.get_data_yahoo(
    ['CVX', 'XOM', 'BP'],
    start=datetime.datetime(2010, 1, 1),
    end=datetime.datetime(2013, 1, 1))['Volume']

valume.head()
rets = prices.pct_change()
rets.head()
prices.plot()
plt.show()
sns.heatmap(rets.corr())
plt.show()
rets.corr()

data = Series(['one', 'two', np.nan, 'four'])
data
dframe = DataFrame(
    [[1, 2, 3],
     [np.nan, 5, 6],
     [7, np.nan, 9],
     [np.nan, np.nan, np.nan]])
dframe
dframe2 = DataFrame(
    [[1, 2, 3, nan],
     [2, nan, 5, 6],
     [nan, 7, nan, 9],
     [1, nan, nan, nan]])
dframe2
dframe2.dropna(thresh=2)
dframe2.fillna({0: 'a', 1: 'b', 2: 'c', 3: 'd'})
ser = Series(np.random.randn(6),
             index=[[1, 1, 1, 2, 2, 2],
                    ['a', 'b', 'c', 'a', 'b', 'c']])
ser
ser.index
ser[1]
ser[2]
ser[:, 'a']
dframe = ser.unstack()
dframe
dframe
dframe.T.unstack()
dframe2 = DataFrame(np.arange(16).reshape(4, 4),
                    index=[['a', 'a', 'b', 'b'], [1, 2, 1, 2]],
                    columns=[['NY', 'NY', 'LA', 'SF'],
                             ['cold', 'hot', 'hot', 'cold']])
dframe2
