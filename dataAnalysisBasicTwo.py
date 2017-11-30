import numpy as np
import pandas as pd
import pandas.util.testing as tm
from pandas import DataFrame, Series

dframe1 = DataFrame(
    {'key': ['X', 'Z', 'Y', 'Z', 'X', 'X'],
     'data_set_1': np.arange(6)})
dframe1

dframe2 = DataFrame(
    {'key': ['Q', 'Y', 'Z'],
     'data_set_2': [1, 2, 3]})
dframe2
pd.merge(dframe1, dframe2)

pd.merge(dframe1, dframe2, how='right')


# 今度は多対多
# 両方のDataFrameで、keyに関して複数の行がある。
dframe3 = DataFrame({'key': ['X', 'X', 'X', 'Y', 'Z', 'Z'],
                     'data_set_3': range(6)})
dframe4 = DataFrame({'key': ['Y', 'Y', 'X', 'X', 'Z'],
                     'data_set_4': range(5)})

dframe3
dframe4
# Show the merge
pd.merge(dframe3, dframe4, how='left')
df_left = DataFrame({'key1': ['SF', 'SF', 'LA'],
                     'key2': ['one', 'two', 'one'],
                     'left_data': [10, 20, 30]})
df_right = DataFrame({'key1': ['SF', 'SF', 'LA', 'LA'],
                      'key2': ['one', 'one', 'one', 'two'],
                      'right_data': [40, 50, 60, 70]})
df_left
df_right
pd.merge(df_left, df_right, on=['key1', 'key2'], how='outer')
print("{0:.20f}".format(0.33))


# DataFrameを2つ用意します。
df_left = DataFrame({'key': ['X', 'Y', 'Z', 'X', 'Y'],
                     'data': range(5)})
df_right = DataFrame({'group_data': [10, 20]}, index=['X', 'Y'])


df_left

df_right
pd.merge(df_left, df_right, left_on='key', right_index=True)

pd.merge(df_left, df_right, left_on='data', right_index=True, how='outer')
df_left_hr = DataFrame({'key1': ['SF', 'SF', 'SF', 'LA', 'LA'],
                        'key2': [10, 20, 30, 20, 30],
                        'data_set': np.arange(5.)})
df_right_hr = DataFrame(np.arange(10).reshape((5, 2)),
                        index=[['LA', 'LA', 'SF', 'SF', 'SF'],
                               [20, 10, 10, 10, 20]],
                        columns=['col_1', 'col_2'])
df_left_hr

# 階層的なindexの例
df_right_hr


# leftは列名で、rightはindexでマージします。
pd.merge(df_left_hr, df_right_hr, left_on=['key1', 'key2'], right_index=True)

# outer
pd.merge(df_left_hr, df_right_hr, left_on=[
         'key1', 'key2'], right_index=True, how='outer')


# joinというメソッドもあります
df_left.join(df_right)


arr1 = np.arange(9).reshape(3, 3)
arr1
np.concatenate([arr1, arr1], axis=1)
np.concatenate([arr1, arr1], axis=0)

ser1 = Series([0, 1, 2], index=['T', 'U', 'V'])
ser2 = Series([3, 4], index=['X', 'Y'])
ser1
ser2
pd.concat([ser1, ser2])
# DataFrameでも同じ事ができます。
dframe1 = DataFrame(np.random.randn(4, 3), columns=['X', 'Y', 'Z'])
dframe2 = DataFrame(np.random.randn(3, 3), columns=['Y', 'Q', 'X'])

dframe1
dframe2
pd.concat([dframe1, dframe2])
pd.concat([dframe1, dframe2], ignore_index=True)


# いくつかサンプルになるデータを作ります。
ser1 = Series([2, np.nan, 4, np.nan, 6, np.nan],
              index=['Q', 'R', 'S', 'T', 'U', 'V'])

# 長さを同じにします。
ser2 = Series(np.arange(len(ser1), dtype=np.float64),
              index=['Q', 'R', 'S', 'T', 'U', 'V'])


ser1

ser2
Series(np.where(pd.isnull(ser1), ser2, ser1), index=ser1.index)
np.where(pd.isnull(ser1))
Series(np.where(pd.isnull(ser1), ser2, ser1), index=ser1.index)
ser1.combine_first(ser2)

dframe_odds = DataFrame({'X': [1., np.nan, 3., np.nan],
                         'Y': [np.nan, 5., np.nan, 7.],
                         'Z': [np.nan, 9., np.nan, 11.]})
dframe_evens = DataFrame({'X': [2., 4., np.nan, 6., 8.],
                          'Y': [np.nan, 10., 12., 14., 16.]})
dframe_odds

dframe_evens

dframe_odds.combine_first(dframe_evens)

dframe1 = DataFrame(np.arange(8).reshape((2, 4)),
                    index=pd.Index(['LA', 'SF'], name='city'),
                    columns=pd.Index(['A', 'B', 'C', 'D'], name='letter'))
dframe1
dframe_st = dframe1.stack()
type(dframe_st)
dframe_st
dframe_st.unstack()
dframe_st.unstack(0)

dframe_st.unstack("letter")
dframe_st.unstack("city")

ser1 = Series([0, 1, 2], index=['Q', 'X', 'Y'])
ser2 = Series([4, 5, 6], index=['X', 'Y', 'Z'])

dframe = pd.concat([ser1, ser2], keys=['Alpha', 'Beta'])
dframe
dframe.unstack()
dframe.unstack().stack()
dframe.unstack().stack(dropna=False)


tm.N = 3


def unpivot(frame):
    N, K = frame.shape
    data = {"value": frame.values.ravel("F"),
            "variable": np.asarray(frame.columns).repeat(N),
            "date": np.tile(np.asarray(frame.index), K)}
    return DataFrame(data, columns=['date', 'variable', 'value'])


dframe = unpivot(tm.makeTimeDataFrame())
dframe
dframe_piv = dframe.pivot('date', 'variable', 'value')
dframe_piv


dframe = DataFrame({"key1": ["A"] * 2 + ["B"] * 3, "key2": [2, 2, 2, 3, 3]})
dframe
dframe.duplicated()
dframe.drop_duplicates()
dframe.drop_duplicates(["key2"])


dframe = DataFrame({"city": ['Alma', 'Brian Head', 'Fox Park'],
                    'altitude': [3158, 3000, 2762]})
dframe
state_map = {'Alma': 'Colorado', 'Brian Head': 'Utah', 'Fox Park': 'Wyoming'}
dframe['state'] = dframe['city'].map(state_map)
dframe


ser1 = Series([1, 2, 3, 4, 1, 2, 3, 4])
ser1
ser1.replace(1, np.nan)
ser1.replace([1, 4], [100, 400])
ser1.replace({4: np.nan})


dframe = DataFrame(np.arange(12).reshape((3, 4)),
                   index=['NY', 'LA', 'SF'],
                   columns=['A', 'B', 'C', 'D'])
dframe
dframe.index = dframe.index.map(str.lower)

dframe
dframe.rename(index={'ny': 'NEW YORK'},
              columns={'A': 'ALPHA'})
dframe


years = [1990, 1991, 1992, 2008, 2012, 2015, 1987, 1969, 2013, 2008, 1999]
# これを10年ごとにまとめてみます。
decade_bins = [1960, 1970, 1980, 1990, 2000, 2010, 2020]

decade_cat = pd.cut(years, decade_bins)
decade_cat.shape

decade_cat.categories
pd.value_counts(decade_cat)

np.random.seed(12345)
dframe = DataFrame(np.random.randn(1000, 4))
dframe.head()
dframe.tail()

dframe.describe()
col = dframe[0]
col.head()
col[np.abs(col) > 3]
np.abs(-3.33)
dframe[(np.abs(dframe) > 3).any(1)]
np.sign(dframe)


dframe = DataFrame(np.arange(4 * 4).reshape((4, 4)))
blender = np.random.permutation(4)
blender

dframe
dframe.take(blender)
