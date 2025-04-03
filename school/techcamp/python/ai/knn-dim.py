from sklearn.cross_validation import train_test_split
from sklearn.preprocessing import StandardScaler
from sklearn.neighbors import KNeighborsClassifier
from sklearn.metrics import accuracy_score
from itertools import combinations
import matplotlib.pyplot as plt
import pandas as pd
import numpy as np


wine = pd.read_csv(
    'https://raw.githubusercontent.com/we-b/datasets_for_ai/master/wine.data')
print(wine.head())
print(len(wine.columns))

wine["Class label"].value_counts()

x = wine.iloc[:, 1:].values
print(x.shape)

y = wine.iloc[:, 0].values
print(y.shape)

x_train, x_test, y_train, y_test = train_test_split(
    x, y, test_size=0.3, random_state=0)

sc = StandardScaler()
x_train_std = sc.fit_transform(x_train)
print(x_train)
print(x_train_std)
x_test_std = sc.fit_transform(x_test)
print(x_test)
print(x_test_std)


# train_test_splitの振り分けを検証---------------------------
a = np.linspace(start=1, stop=10, num=10)
b = np.linspace(start=11, stop=20, num=10)
print(a.shape)
print(b.shape)

a_train, a_test, b_train, b_test = train_test_split(
    a, b, test_size=0.3, random_state=0)

print(a_train.shape)
print(b_train.shape)

print(a_train)
print(b_train)

# --------------------------------------------------------


knn = KNeighborsClassifier(n_neighbors=2)
knn.fit(x_train_std, y_train)
print(x_train_std.shape)
print(y_train.shape)

print('トレーニングデータの正答率: ', knn.score(x_train_std, y_train))
print('テストデータの正答率: ', knn.score(x_test_std, y_test))


x_train2, x_test2, y_train2, y_test2 = train_test_split(x_train_std,
                                                        y_train,
                                                        test_size=0.25,
                                                        random_state=1)


dimension = x_train2.shape[1]
print(dimension)

indices = tuple(range(dimension))
print(indices)


knn.fit(x_train2, y_train2)
y_predict = knn.predict(x_test2)
origin_score = accuracy_score(y_test2, y_predict)
print(origin_score)


dimension = dimension - 1


# combinationsの実装 3つの中から2つを選ぶ--------------------------------
list = ["a", "b", "c"]
for patern in combinations(list, 2):
    print("1", patern)
    print("3", patern)

for patern in combinations(list, 1):
    print(patern)
# --------------------------------------------------------------------

print("indices: ", indices)
for c in combinations(indices, dimension):
    print("combinations: ", c)


scores = []
subsets = []

best_scores = [origin_score]
best_subsets = [indices]

print(scores)
print(subsets)
print(best_scores)
print(best_subsets)
print(origin_score)
print(indices)


for c in combinations(indices, dimension):
    print("1", c)
    knn.fit(x_train2[:, c], y_train2)
    y_pred = knn.predict(x_test2[:, c])
    score = accuracy_score(y_test2, y_pred)
    scores.append(score)
    subsets.append(c)
    print("2", c)


best = np.argmax(scores)
print(best)

indices = subsets[best]
print(indices)

best_subsets.append(indices)
print(best_subsets)
best_scores.append(scores[best])
print(best_scores)


print(x_train2.shape)
dimension = x_train2.shape[1]
print(dimension)
indices = tuple(range(dimension))


knn.fit(x_train2, y_train2)
y_predict = knn.predict(x_test2)

score = accuracy_score(y_test2, y_predict)
print(score)


best_scores = [score]
best_subsets = [indices]

k_features = 1

while dimension > k_features:
    scores = []
    subsets = []

    for p in combinations(indices, r=dimension - 1):

        knn.fit(x_train2[:, p], y_train2)
        y_pred = knn.predict(x_test2[:, p])
        score = accuracy_score(y_test2, y_pred)
        scores.append(score)
        subsets.append(p)

    best = np.argmax(scores)
    indices = subsets[best]
    best_subsets.append(indices)
    best_scores.append(np.max(scores))
    dimension -= 1

print(best_subsets)
print(best_scores)


k_fea = [len(k) for k in best_subsets]
print(k_fea)
plt.plot(k_fea, best_scores, marker='o', color='red')
plt.ylim([0.5, 1.1])
plt.xlabel('Number of Dimensions')
plt.ylabel('Correct Answer Rate')
plt.grid()
plt.show()


index = best_subsets[7]
print(index)

knn.fit(x_train_std[:, index], y_train)

print('トレーニングデータの正答率: ', knn.score(x_train_std[:, index], y_train))
print('テストデータの正答率: ', knn.score(x_test_std[:, index], y_test))
