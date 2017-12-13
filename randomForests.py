import numpy as np
import pandas as pd
import matplotlib.pyplot as plt
import seaborn

from sklearn.datasets import make_blobs
from sklearn.tree import DecisionTreeClassifier
from sklearn.ensemble import RandomForestClassifier
from sklearn.ensemble import RandomForestRegressor

"""
決定木とランダムフォレスト（Random Forests）
原作者のJoseさんのブログをまずはご覧ください。 こちら
https://towardsdatascience.com/enchanted-random-forest-b08d418cb411
Pythonをつかって、決定木とランダムフォレストの世界を探検してみましょう。
"""

"""

ランダムフォレスト分類器
ランダムフォレスト（Random forests）は、アンサンブル学習法の一つです。
アンサンブル学習法は、いくつかの分類器を集めて構成されるものですが、ここでは決定木が使われます。
（木が集まるから森というわけです）
"""

X, y = make_blobs(n_samples=500, centers=4, random_state=8, cluster_std=2.4)
# Scatter plot the points
plt.figure(figsize=(10, 10))
plt.scatter(X[:, 0], X[:, 1], c=y, s=50, cmap='jet')
plt.show()


def visualize_tree(classifier, X, y, boundaries=True, xlim=None, ylim=None):
    '''
    決定木の可視化をします。
    INPUTS: 分類モデル, X, y, optional x/y limits.
    OUTPUTS: Meshgridを使った決定木の可視化
    '''
    # fitを使ったモデルの構築
    classifier.fit(X, y)

    # 軸を自動調整
    if xlim is None:
        xlim = (X[:, 0].min() - 0.1, X[:, 0].max() + 0.1)
    if ylim is None:
        ylim = (X[:, 1].min() - 0.1, X[:, 1].max() + 0.1)

    x_min, x_max = xlim
    y_min, y_max = ylim

    # meshgridをつくります。
    xx, yy = np.meshgrid(np.linspace(x_min, x_max, 100),
                         np.linspace(y_min, y_max, 100))

    # 分類器の予測をZとして保存
    Z = classifier.predict(np.c_[xx.ravel(), yy.ravel()])
    # meshgridを使って、整形します。
    Z = Z.reshape(xx.shape)

    # 分類ごとに色を付けます。
    plt.figure(figsize=(10, 10))
    plt.pcolormesh(xx, yy, Z, alpha=0.2, cmap='jet')

    # 訓練データも描画します。
    plt.scatter(X[:, 0], X[:, 1], c=y, s=50, cmap='jet')

    plt.xlim(x_min, x_max)
    plt.ylim(y_min, y_max)

    def plot_boundaries(i, xlim, ylim):
        '''
        境界線を描き込みます。
        '''
        if i < 0:
            return

        tree = classifier.tree_

        # 境界を描画するために、再帰的に呼び出します。
        if tree.feature[i] == 0:
            plt.plot([tree.threshold[i], tree.threshold[i]], ylim, '-k')
            plot_boundaries(tree.children_left[i],
                            [xlim[0], tree.threshold[i]], ylim)
            plot_boundaries(tree.children_right[i],
                            [tree.threshold[i], xlim[1]], ylim)

        elif tree.feature[i] == 1:
            plt.plot(xlim, [tree.threshold[i], tree.threshold[i]], '-k')
            plot_boundaries(tree.children_left[i], xlim,
                            [ylim[0], tree.threshold[i]])
            plot_boundaries(tree.children_right[i], xlim,
                            [tree.threshold[i], ylim[1]])

    if boundaries:
        plot_boundaries(0, plt.xlim(), plt.ylim())



# 深さ2までのプロットを描いて見ます。
# モデルを作ります。
clf = DecisionTreeClassifier(max_depth=2, random_state=0)
# 描画します。
visualize_tree(clf, X, y)
plt.show()

# 深さを4にしてみます
clf = DecisionTreeClassifier(max_depth=4, random_state=0)
visualize_tree(clf, X, y)
plt.show()


"""
あまりにも細かく分類すると、過学習（over fitting）の問題が起こります。

Random Forests
過学習の問題を回避するための一つの方法が、ランダムフォレストです。
ランダムフォレストは、学習データの一部をランダムに選んで、決定木を作ります。
これを繰り返すことによって、色々な種類の木が出来るので、汎化性能が下がるのを避けることが出来るわけです。
"""


# n_estimatorsは、作る木の数です。
clf = RandomForestClassifier(n_estimators=100, random_state=0)
# 境界線を書かないようにします。
visualize_tree(clf, X, y, boundaries=False)
plt.show()

"""
決定木とは違った境界線が描かれているのがわかります。

Random Forest Regression
ランダムフォレストは、分類だけではなく、回帰にも使うことができます。
ダミーのデータを作って、試してみましょう。
"""

x = 10 * np.random.rand(100)
x


def sin_model(x, sigma=0.2):
    '''
    大きな波＋小さな波＋ノイズからなるダミーデータです。
    '''

    noise = sigma * np.random.randn(len(x))

    return np.sin(5 * x) + np.sin(0.5 * x) + noise


# xからyを計算
y = sin_model(x)

# Plotします。
plt.figure(figsize=(16, 8))
plt.errorbar(x, y, 0.1, fmt='o')
plt.show()

"""
このデータを単純な線形回帰で予測しようとしても難しいのは、一目瞭然です。
そこで、ランダムフォレストを使って見ることにしましょう。
"""


# X を用意します。
xfit = np.linspace(0, 10, 1000)

# 回帰モデルを用意します。
rfr = RandomForestRegressor(100)

# モデルを学習させます。
rfr.fit(x[:, None], y)

# 予測値を計算します。
yfit = rfr.predict(xfit[:, None])

# 実際の値です。
ytrue = sin_model(xfit, 0)

# Plot します
plt.figure(figsize=(16, 8))

plt.errorbar(x, y, 0.1, fmt='o')

plt.plot(xfit, yfit, '-r')
plt.plot(xfit, ytrue, '-k', alpha=0.5)

plt.show()

"""
ランダムフォレストは、このように分類だけでは無く、回帰にも使えるので、
非常に応用範囲が広い方法論です。
"""
