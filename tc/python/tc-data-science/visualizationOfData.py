import numpy as np
import pandas as pd
import matplotlib as mpl
import matplotlib.pyplot as plt
import seaborn as sns
import statsmodels
from pandas import Series
from numpy.random import randn
from scipy import stats


dataset1 = randn(100)
plt.hist(dataset1, edgecolor="k")
plt.show()


dataset2 = randn(80)
plt.hist(dataset2, color="indianred", edgecolor="k")
plt.show()

plt.hist(dataset1, normed=True, edgecolor="k")

plt.show()


plt.hist(dataset1, normed=True, alpha=0.5, bins=20, edgecolor="k")
plt.hist(
    dataset2,
    normed=True,
    alpha=0.5,
    bins=20,
    color='indianred',
    edgecolor="k")
plt.show()

data1 = randn(1000)
data2 = randn(1000)

sns.jointplot(data1, data2, edgecolor="k")
plt.show()
sns.jointplot(data1, data2, kind='hex')
plt.show()


dataset = randn(25)
sns.rugplot(dataset)
plt.ylim(0, 1)
plt.show()

plt.hist(dataset, alpha=0.3, edgecolor="k")
sns.rugplot(dataset)
plt.show()


sns.rugplot(dataset)
x_min = dataset.min() - 2
x_max = dataset.max() + 2

x_axis = np.linspace(x_min, x_max, 100)
bandwidth = ((4 * dataset.std() ** 5) / (3 * len(dataset))) ** 0.2
kernel_list = []

dataset.shape
dataset
dataset[0]
kernel = stats.norm(dataset[0], bandwidth)
kernel
type(kernel)
kernel.mean()
kernel.std()

kernel.var()
x_axis.shape
x_axis
plt.plot(x_axis)
plt.show()

# x_axisの正規分布を生成する
kernel2 = stats.norm(dataset[0], bandwidth).pdf(x_axis)
kernel2.shape
kernel2
kernel2.max()
plt.plot(kernel2)
plt.show()


for data_point in dataset:
    kernel = stats.norm(data_point, bandwidth).pdf(x_axis)
    kernel_list.append(kernel)

    kernel = kernel / kernel.max()
    kernel = kernel * 0.4
    plt.plot(x_axis, kernel, color='grey', alpha=0.5)
plt.ylim(0, 1)
plt.show()

kernel_list

sum_of_kde = np.sum(kernel_list, axis=0)

fig = plt.plot(x_axis, sum_of_kde, color='indianred')

sns.rugplot(dataset, c='indianred')

plt.yticks([])
plt.suptitle("Sum of the Basis Functions")

plt.show()
sns.kdeplot(dataset)
plt.show()

sns.rugplot(dataset, color='black')
# バンド幅を変えてみましょう。
for bw in np.arange(0.5, 2, 0.25):
    sns.kdeplot(dataset, bw=bw, label=bw)

plt.show()


kernel_options = ['biw', 'cos', 'epa', 'gau', 'tri', 'triw']

for kern in kernel_options:
    sns.kdeplot(dataset, kernel=kern, label=kern)

plt.show()

for kern in kernel_options:
    sns.kdeplot(dataset, kernel=kern, label=kern, shade=True, alpha=0.5)
plt.show()
for kern in kernel_options:
    sns.kdeplot(dataset, kernel=kern, vertical=True)
plt.show()


plt.hist(dataset, cumulative=True, edgecolor='k')
plt.show()
sns.kdeplot(dataset, cumulative=True)
plt.show()


# 2次元平面上の中心
mean = [0, 0]
# それぞれの分散を決めます。
cov = [[1, 0], [0, 100]]
# これに従う多変量正規分布
dataset2 = np.random.multivariate_normal(mean, cov, 1000)
# DataFrameにしておきましょう。
dframe = pd.DataFrame(dataset2, columns=['X', 'Y'])
# プロットします。SeabornとPandasの相性は抜群
sns.kdeplot(dframe)

plt.show()

sns.kdeplot(dframe.X, dframe.Y)
plt.show()
sns.kdeplot(dframe.X, dframe.Y, shade=True)
plt.show()

# バンド幅を変えられます。
sns.kdeplot(dframe, bw=1)
plt.show()

# 文字列でも渡せます。
sns.kdeplot(dframe, bw='silverman')
plt.show()

# 同時分布の推定も可能です。
sns.jointplot('X', 'Y', dframe, kind='kde')
plt.show()


dataset = randn(100)
sns.distplot(dataset, bins=25,)
plt.show()
sns. distplot(dataset, hist=False, rug=True)
plt.show()

# それぞれのグラフのスタイルを変更することもできます
sns.distplot(dataset, bins=25,
             kde_kws={'color': 'indianred', 'label': 'KDE PLOT'},
             hist_kws={
                 'color': 'blue',
                 'edgecolor': 'k',
                 'label': "HISTOGRAM"})
plt.show()

ser1 = Series(dataset, name='MyData')
sns.distplot(ser1, bins=25,
             hist_kws={"edgecolor": "k"})
plt.show()


data1 = randn(100)
data2 = randn(100) + 2

sns.distplot(data1)
sns.distplot(data2)
plt.show()

sns.boxplot(data=[data1, data2])
plt.show()
sns.boxplot(data=[data1, data2], whis=np.inf)
plt.show()
sns.boxplot(data=data1)
plt.show()

sns.boxplot(data=[data1, data2], whis=np.inf, orient='h')
plt.show()


data1 = stats.norm(0, 5).rvs(100)
data1


# γ分布に従う乱数を生成します。
data2 = np.concatenate([stats.gamma(5).rvs(50) - 1,
                        -1 * stats.gamma(5).rvs(50)])

data2.shape
sns.boxplot(data=[data1, data2], whis=np.inf)
plt.show()

sns.violinplot(data=[data1, data2])
plt.show()

# バンド幅を細かくしてみましょう。
sns.violinplot(data=data2, bw=0.01)
plt.show()


# Seabornにサンプルデータがあります。
tips = sns.load_dataset("tips")
tips.head()

sns.lmplot("total_bill", "tip", tips, size=10)
plt.show()


# グラフごとにパラメータを変えられます。
sns.lmplot("total_bill", "tip", tips,
           scatter_kws={'marker': 'o', 'color': 'indianred', 's': 10},
           line_kws={'linewidth': 1, 'color': 'blue'})

plt.show()

# 4次関数で回帰曲線をひくこともできます。
sns.lmplot("total_bill", "tip", tips, order=4,
           scatter_kws={"marker": "o", "color": "indianred", "s": 8},
           line_kws={"linewidth": 1, "color": "blue"})
plt.show()

# 単なるプロットもできます。
sns.lmplot("total_bill", "tip", tips, fit_reg=False)
plt.show()

# 離散的な値でもlmplot()は使えます。
# チップの割合を計算します。
tips["tip_pect"] = 100 * (tips['tip'] / tips['total_bill'])
tips.head()
tips["tip_pect"] = 100 * (tips["tip"] / tips['total_bill'])
tips.head()
sns.lmplot("size", "tip_pect", tips)
plt.show()

sns.lmplot("size", "tip_pect", tips, x_jitter=0.2)
plt.show()


sns.lmplot("size", "tip_pect", tips, x_estimator=np.mean)
plt.show()

# hueが便利です。
sns.lmplot("total_bill", "tip_pect", tips, hue="sex", markers=["x", "o"])
plt.show()

sns.lmplot("total_bill", "tip_pect", tips, hue="day")

# LOESSの説明（英語）です。
url = 'http://en.wikipedia.org/wiki/Local_regression'
sns.lmplot("total_bill", "tip_pect", tips,
           lowess=True, line_kws={"color": 'black'})
plt.show()

# lmplot() は実は、もっと低レベルな関数regplotを使っています。
sns.regplot("total_bill", "tip_pect", tips)
plt.show()

# 描画のエリアを分割することもできます。
fig, (axis1, axis2) = plt.subplots(1, 2, sharey=True)

sns.regplot("total_bill", "tip_pect", tips, ax=axis1)
sns.violinplot(y='tip_pect',
               x='size',
               data=tips.sort_values('size'),
               ax=axis2,
               scatter_kws={"marker": "o", "color": "indianred", "s": 8}
               )
plt.show()


flight_dframe = sns.load_dataset('flights')
flight_dframe.head()

flight_dframe = flight_dframe.pivot('month', 'year', 'passengers')
flight_dframe

sns.heatmap(flight_dframe)
plt.show()

# 数字を書き込めます。
sns.heatmap(flight_dframe, annot=True, fmt='d')
plt.show()

# 中心を指定して、色を変えられます。
sns.heatmap(flight_dframe, center=flight_dframe.loc['January', 1955])
plt.show()

f, (axis1, axis2) = plt.subplots(2, 1)
yearly_flights = flight_dframe.sum()
years = pd.Series(yearly_flights.index.values)
years = pd.DataFrame(years)

flights = pd.Series(yearly_flights.values)
flights = pd.DataFrame(flights)

year_dframe = pd.concat((years, flights), axis=1)
year_dframe.columns = ['Year', 'Flights']

sns.barplot('Year', y='Flights', data=year_dframe, ax=axis1)
sns.heatmap(flight_dframe, cmap='Blues', ax=axis2,
            cbar_kws={'orientation': 'horizontal'})
plt.show()

sns.clustermap(flight_dframe)
plt.show()

sns.clustermap(flight_dframe, col_cluster=False)
plt.show()

sns.clustermap(flight_dframe, standard_scale=1)
plt.show()

sns.clustermap(flight_dframe, standard_scale=0)
plt.show()

sns.clustermap(flight_dframe, z_score=1)
plt.show()
