from itertools import combinations
import pandas as pd
import matplotlib.pyplot as plt
from sklearn.cross_validation import train_test_split
from sklearn.preprocessing import StandardScaler
from sklearn.neighbors import KNeighborsClassifier
from sklearn.metrics import accuracy_score
import numpy as np
from itertools import combinations


wine = pd.read_csv(
    'https://raw.githubusercontent.com/we-b/datasets_for_ai/master/wine.data')
print(wine.head())
print(len(wine.columns))
wine["Class label"].value_counts()

# 2列目以降の全てのレコード(行)をXに代入
X = wine.iloc[:, 1:].values
print(X.shape)

# 1列目の全てのレコード(行)をyに代入
y = wine.iloc[:, 0].values
print(y.shape)

X_train, X_test, y_train, y_test = train_test_split(
    X, y, test_size=0.3, random_state=0)


# 平均と標準偏差を計算して、標準化
sc = StandardScaler()
X_train_std = sc.fit_transform(X_train)
X_test_std = sc.fit_transform(X_test)
X_train_std

# インスタンス生成
knn = KNeighborsClassifier(n_neighbors=2)
# モデルへフィッティング
knn.fit(X_train_std, y_train)

print('トレーニングデータの正答率: ', knn.score(X_train_std, y_train))
# => トレーニングデータの正答率:  0.983870967742
print('テストデータの正答率: ', knn.score(X_test_std, y_test))
# => テストデータの正答率:  0.944444444444


# トレーニングデータ(X_train_std, y_train)を再び分割し、トレーニング用と検証用に分ける
X_train2, X_test2, y_train2, y_test2 = train_test_split(X_train_std,
                                                        y_train,
                                                        test_size=0.25,
                                                        random_state=1)


# Xの特徴量の個数を取得
dimension = X_train2.shape[1]
# 列数を数えて、特徴量の数を取得している。
print(dimension)


# 全体特徴量をインデックスとして管理
indices = tuple(range(dimension))
print(indices)


knn.fit(X_train2, y_train2)
# クラスラベルの予測
y_predict = knn.predict(X_test2)
# 真のクラスと予測値を使ってスコアを計算
origin_score = accuracy_score(y_test2, y_predict)
# 正答率を確認
print(origin_score)


# 特徴量を1つ減らして12次元にする
dimension = dimension - 1


print("indices: ", indices)
for c in combinations(indices, dimension):
    print("combinations: ", c)


# 12通りの組み合わせをそれぞれ予測まで行い、一時的に格納しておくための配列
scores = []
subsets = []

# 12通りの組み合わせで一番スコアが良かったものを格納する配列
best_scores = [origin_score]
best_subsets = [indices]

print(best_scores)
print(indices)
indices

dimension
for c in combinations(indices, dimension):
    print(c)

for c in combinations(indices, dimension):
    # 1つの組み合わせごとに学習する
    knn.fit(X_train2[:, c], y_train2)
    # 学習した時と同じ組み合わせで、クラスラベルの予測
    y_pred = knn.predict(X_test2[:, c])
    # 真のクラスと予測値を使ってスコアを計算
    score = accuracy_score(y_test2, y_pred)
    # 選択した特徴量のスコアを格納
    scores.append(score)
    # 選択した特徴量のインデックスを格納
    subsets.append(c)

best = np.argmax(scores)
scores
print(best)

# bestの列インデックスを抽出
indices = subsets[best]
print(indices)

# その列インデックスを格納
best_subsets.append(indices)
print(best_subsets)

# スコアを格納
best_scores.append(scores[best])
print(best_scores)


# 変数の初期化
# Xの特徴量の個数を取得
dimension = X_train2.shape[1]

# 全体特徴量をインデックスとして管理
indices = tuple(range(dimension))

# 全ての特徴量を使って、スコアを計算する
knn.fit(X_train2, y_train2)
y_predict = knn.predict(X_test2)

# 真のクラスと予測値を使ってスコアを計算
score = accuracy_score(y_test2, y_predict)

# 12通りの組み合わせで一番スコアが良かったものを格納する配列
best_scores = [origin_score]
best_subsets = [indices]

# 最小の特徴量の個数を指定
k_features = 1
# 指定した個数まで処理を繰り返す
while dimension > k_features:
    # 空のリストを準備(スコア、特徴量の組み合わせ)
    scores = []
    subsets = []

    # 特徴量の部分集合を表す列インデックスの組み合わせごとに処理を反復
    for p in combinations(indices, dimension-1):
        # スコアを計算
        knn.fit(X_train2[:, p], y_train2)
        # クラスラベルの予測
        y_pred = knn.predict(X_test2[:, p])
        # 真のクラスと予測値を使ってスコアを計算
        score = accuracy_score(y_test2, y_pred)
        # 選択した特徴量のスコアとインデックスを格納
        scores.append(score)
        subsets.append(p)

    # 最もスコアが良かった時の特徴量の組み合わせがいつ発生したか抽出
    best = np.argmax(scores)
    # 1番スコアが良かった時の特徴量の組み合わせを抽出
    indices = subsets[best]
    # 特徴量の組み合わせを配列に格納
    best_subsets.append(indices)
    # スコアを格納
    best_scores.append(np.max(scores))
    # 特徴量を1つ減らして、while文を繰り返す
    dimension -= 1


print(best_subsets)

print(best_scores)


# 特徴量の個数のリスト
k_fea = [len(k) for k in best_subsets]

plt.xlabel('Number of Dimensions')
plt.ylabel('Correct Answer Rate')
# 横軸を特徴量の個数、縦軸をスコアとした折れ線グラフ
plt.plot(k_fea, best_scores, marker='o', color='red')
plt.ylim([0.5, 1.1])
# x軸とy軸のタイトルを表示

# 目盛(グリッド)線の表示
plt.grid()
plt.show()

# 特徴量を選択し、インデックスを変数に格納
index = best_subsets[7]
print(index)

# 6つの特徴量でフィッティング
knn.fit(X_train_std[:, index], y_train)

print('トレーニングデータの正答率: ', knn.score(X_train_std[:, index], y_train))
print('テストデータの正答率: ', knn.score(X_test_std[:, index], y_test))
