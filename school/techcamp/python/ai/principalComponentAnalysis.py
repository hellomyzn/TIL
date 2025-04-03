import pandas as pd
pokemon = pd.read_csv('https://raw.githubusercontent.com/we-b/datasets_for_ai/master/poke.csv')
pokemon.head()

# NumPy配列をarrayメソッドで作成
import numpy as np
X = np.array(pokemon)


X[24]
X[150]

X.shape
X[[24, 150], [[0], [2], [3],[4]]]


# ['HP','Attack','Defense','Sp. Atk','Sp. Def','Speed']の特徴量を取得
X = X[:, 2:8]

attr = pokemon.columns[2:8]

# PCAクラスの読み込み
from sklearn.decomposition import PCA
# 主成分数を2に設定したインスタンスを生成
pca = PCA(n_components=2)
# PCAのインスタンスでポケモンのデータを学習
pca.fit(X)
# データについて学習したPCAで主成分を抽出する
X_pca = pca.transform(X)
print(X_pca)

# 必要なライブラリのインポート
import numpy as np

import matplotlib.pyplot as plt



x = X_pca[:,0]
y = X_pca[:,1]
fig, ax = plt.subplots(figsize=(8,8))
plt.scatter(x, y)
plt.show()

pca.explained_variance_ratio_

pca = PCA(n_components=6)

pca.fit(X)
pca.explained_variance_ratio_


pca.components_

fig, ax = plt.subplots(figsize=(8,8))
plt.scatter(x, y)
for i in range(pca.components_.shape[1]):
    x1=pca.components_[0,i]*100
    y1=pca.components_[1,i]*100
    ax.arrow(0, 0, x1, y1,  head_width=5, head_length=10, fc='k', ec='k')
    plt.text(x1+15, y1, attr[i])
plt.show()
