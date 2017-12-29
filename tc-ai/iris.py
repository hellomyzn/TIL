from sklearn import datasets
from sklearn.cross_validation import train_test_split
from sklearn.linear_model import LogisticRegression
from sklearn.metrics import accuracy_score
from matplotlib.colors import ListedColormap
import matplotlib.pyplot as plt
import pandas as pd
import numpy as np


iris = datasets.load_iris()
iris = datasets.load_iris()
print(iris.DESCR)
pd.DataFrame(data=iris.data, columns=iris.feature_names).head()
X = iris.data[:, [2, 3]]
print(X)
y = iris.target
print(y)
X_train, X_test, y_train, y_test = train_test_split(
    X, y, test_size=0.3, random_state=0)
print(X_train.shape)
print(X_test.shape)
print(y_train.shape)
print(y_test.shape)
lr = LogisticRegression(C=1000.0, random_state=0)
lr.fit(X_train, y_train)
y_p = lr.predict(X_test)
print('誤分類の個数：',  (y_test != y_p).sum())

print('正答率:', accuracy_score(y_test, y_p))

markers = ('o', '^', 'x')
colors = ('red', 'lightgreen', 'cyan')
cmap = ListedColormap(colors)

print(y)
np.unique(y)

for i, n in enumerate(np.unique(y)):
    plt.scatter(x=X_train[y_train == n, 0],
                y=X_train[y_train == n, 1],
                c=cmap(i),
                marker=markers[i],
                s=70,
                edgecolors='',
                label=n)

# テストデータは色・マーカーを変えて、プロット
plt.scatter(x=X_test[:, 0],  # X_test(花びらの長さ)の全ての行を取得
            y=X_test[:, 1],  # X_testの1列目(花びらの横幅)の全ての行を取得
            c='k',
            marker='v',
            label='test data'
            )

plt.xlabel('Petal Length')
plt.ylabel('Petal Width')

# 凡例の表示
plt.legend(loc='lower right')
plt.show()


X_min, X_max = X[:, 0].min() - 1, X[:, 0].max() + 1
y_min, y_max = X[:, 1].min() - 1, X[:, 1].max() + 1
print(X_min)
print(X_max)
print(y_min)
print(y_max)

x_axis, y_axis = np.meshgrid(np.arange(X_min, X_max, 0.02),
                             np.arange(y_min, y_max, 0.02))
print(x_axis.shape)
print(x_axis)
print(y_axis.shape)
print(y_axis)

data_num = x_axis.shape[0] * x_axis.shape[1]
print(data_num)
grid_points = np.concatenate((x_axis.reshape(data_num, 1),
                              y_axis.reshape(data_num, 1)), axis=1)
# 構造を確認しよう
print(grid_points.shape)
print(grid_points)

# predictメソッドを使い予測
pred_label = lr.predict(grid_points)
# 配列の中を確認しましょう。
# pred_labelは、予測された品種の番号を格納していることを確認。
print(pred_label)
# predictメソッドに渡した1次元のままであることを確認します。
print(pred_label.shape)


pred_label = pred_label.reshape(x_axis.shape)
# 構造の確認
print(pred_label.shape)
print(x_axis.shape)
print(y_axis.shape)


plt.xlabel('Petal length')
plt.ylabel('Petal width')
# 軸の範囲を指定
plt.xlim(x_axis.min(), x_axis.max())
plt.ylim(y_axis.min(), y_axis.max())
# contourfメソッドを使って、領域を塗りつぶす
plt.contourf(x_axis, y_axis, pred_label, alpha=0.3, cmap=cmap)
plt.show()


# トレーニングデータのプロット
for i, n in enumerate(np.unique(y)):
    plt.scatter(x=X_train[y_train == n, 0],
                y=X_train[y_train == n, 1],
                c=cmap(i),
                marker=markers[i],
                s=70,
                edgecolors='',
                label=n)

# テストデータは色・マーカーを変えて、プロット
plt.scatter(X_test[:, 0],  # X_testの0列目(花びらの長さ)の全ての行を取得
            X_test[:, 1],  # X_testの1列目(花びらの横幅)の全ての行を取得
            c='k',
            marker='v',
            label='test data')

# 軸の範囲を指定
plt.xlim(x_axis.min(), x_axis.max())
plt.ylim(y_axis.min(), y_axis.max())
plt.contourf(x_axis, y_axis, pred_label, alpha=0.3, cmap=cmap)
# 凡例を表示
plt.legend(loc='lower right')

# x軸とy軸のタイトルを表示
plt.xlabel('Petal length')
plt.ylabel('Petal width')
plt.show()
