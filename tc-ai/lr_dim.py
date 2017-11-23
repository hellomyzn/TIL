
from sklearn.cross_validation import train_test_split
from sklearn.preprocessing import StandardScaler
from sklearn.linear_model import LogisticRegression
from matplotlib.colors import ListedColormap
from sklearn.decomposition import PCA
import matplotlib.pyplot as plt
import numpy as np
import pandas as pd

df_wine = pd.read_csv(
    'https://archive.ics.uci.edu/ml/machine-learning-databases/wine/wine.data',
    header=None)

x, y = df_wine.iloc[:, 1:].values, df_wine.iloc[:, 0].values


x_train, x_test, y_train, y_test = train_test_split(
    x, y, test_size=0.3, random_state=0)

# 平均と標準偏差を使って標準化
sc = StandardScaler()
x_train_std = sc.fit_transform(x_train)
x_test_std = sc.fit_transform(x_test)

lr = LogisticRegression(C=0.1, random_state=0)
lr.fit(x_train_std, y_train)

print('トレーニングデータの正答率: ', lr.score(x_train_std, y_train))
print('テストデータの正答率: ', lr.score(x_test_std, y_test))
pca = PCA(n_components=2)
lr = LogisticRegression()

x_train_pca = pca.transform(x_train_std)
x_test_pca = pca.transform(x_test_std)

lr.fit(x_train_pca, y_train)


x_min, x_max = x_train_pca[:, 0].min() - 1, x_train_pca[:, 0].max() + 1
y_min, y_max = x_train_pca[:, 1].min() - 1, x_train_pca[:, 1].max() + 1

x_axis, y_axis = np.meshgrid(np.arange(x_min, x_max, 0.02),
                             np.arange(y_min, y_max, 0.02))

print(x_axis.shape, 'x_axisのshape')
print(y_axis.shape, 'y_axisのshape')

data_num = x_axis.shape[0] * x_axis.shape[1]
print(data_num, 'data_numの中身')

grid_points = np.concatenate((x_axis.reshape(data_num, 1),
                              y_axis.reshape(data_num, 1)), axis=1)

pred_label = lr.predict(grid_points)

pred_label = pred_label.reshape(x_axis.shape)


# マーカーの準備
markers = ('o', '^', 'x')

# 色を用意
colors = ('red', 'lightgreen', 'cyan')
# 指定した数の色を使ったカラーマップを作成
cmap = ListedColormap(colors)
# アヤメの種類を格納
labels = ('setosa', 'versicolor', 'hoge')

for i, n in enumerate(np.unique(y_train)):
    plt.scatter(x_train_pca[y_train == n, 0],
                x_train_pca[y_train == n, 1],
                c=cmap(i),
                marker=markers[i],
                s=70,
                edgecolors='',
                label=i)

# 凡例を表示
plt.legend(loc='lower right')

plt.xlim(x_axis.min(), x_axis.max())
plt.ylim(y_axis.min(), y_axis.max())

# contourfメソッドを使って、領域を塗りつぶす
plt.contourf(x_axis, y_axis, pred_label, alpha=0.3, cmap=cmap)
plt.show()


print('トレーニングデータの正答率: ', lr.score(x_train_pca, y_train))
print('テストデータの正答率: ', lr.score(x_test_pca, y_test))
