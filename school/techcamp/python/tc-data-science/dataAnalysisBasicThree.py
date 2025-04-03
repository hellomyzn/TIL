import pandas as pd
import numpy as np
import webbrowser
import matplotlib.pyplot as plt
from pandas import DataFrame, Series
from io import StringIO

dframe = DataFrame({'k1': ['X', 'X', 'Y', 'Y', 'Z'],
                    'k2': ['alpha', 'beta', 'alpha', 'beta', 'alpha'],
                    'dataset1': np.random.randn(5),
                    'dataset2': np.random.randn(5)})
dframe


# k1をキーとして、データをグループにまとめます。
group1 = dframe['dataset1'].groupby(dframe['k1'])
group1
group1.mean()

# キーは変えられます。
cities = np.array(['NY', 'LA', 'LA', 'NY', 'NY'])
month = np.array(['JAN', 'FEB', 'JAN', 'FEB', 'JAN'])
#  それぞれでグループ化します。
dframe['dataset1'].groupby([cities, month]).mean()
dframe
dframe.groupby('k1').mean()

# 複数の列名にも対応しています。
dframe.groupby(['k1', 'k2']).mean()


dataset2_group = dframe.groupby(['k1', 'k2'])[['dataset2']]
dataset2_group.mean()

dframe.groupby(['k1']).size()
for name, group in dframe.groupby('k1'):
    print('This is {} group'.format(name))
    print(group)
    print('\n')
gr = dframe.groupby('k1')
gr.get_group('X')


animals = DataFrame(np.arange(16).reshape(4, 4),
                    columns=['W', 'X', 'Y', 'Z'],
                    index=['Dog', 'Cat', 'Bird', 'Mouse'])
animals
animals.ix[1: 2, ['W', 'Y']] = np.nan
animals
behavior_map = {'W': 'bad', 'X': 'good', 'Y': 'bad', 'Z': 'good'}
animal_col = animals.groupby(behavior_map, axis=1)
animal_col.sum()

behav_series = Series(behavior_map)
behav_series

animals.groupby(behav_series, axis=1).count()
animals
animals.groupby(len).sum()
# 関数と、キーを混ぜることもできます。
keys = ['A', 'B', 'A', 'B']
# indexの長さと、別のキーを使ってグループ化
animals.groupby([len, keys]).max()


url = 'http://archive.ics.uci.edu/ml/machine-learning-databases/wine-quality/'
webbrowser.open(url)
dframe_wine = pd.read_csv('winequality-red.csv', sep=";")
dframe_wine.head()


dframe_wine["alcohol"].mean()


def max_to_min(arr):
    return arr.max() - arr.min()


wino = dframe_wine.groupby("quality")
wino.describe()


wino.agg(max_to_min)
wino.agg('mean')


dframe_wine.plot(kind='scatter', x="quality", y="alcohol")
plt.show()


dframe_wine = pd.read_csv('winequality-red.csv', sep=';')
dframe_wine.head()


def ranker(df):
    df['alc_concat_rank'] = np.arange(len(df)) + 1
    return df


dframe_wine


dframe_wine.sort_values('alcohol', ascending=False, inplace=True)
dframe_wine = dframe_wine.groupby('quality').apply(ranker)

dframe_wine.head()


num_of_qual = dframe_wine['quality'].value_counts()
num_of_qual

# それぞれのランクから、一番アルコール度数が高いワインを抽出します。
dframe_wine[dframe_wine.alc_concat_rank == 1].sort_values("quality")


data = """Sample  Animal   Intelligence
    1   Dog   Dumb
    2 Dog Dumb
    3   Cat Smart
    4 Cat    Smart
    5 Dog Smart
    6 Cat Smart"""
dframe = pd.read_table(StringIO(data), sep='\s+')
dframe

pd.crosstab(dframe.Animal, dframe.Intelligence, margins=True)
