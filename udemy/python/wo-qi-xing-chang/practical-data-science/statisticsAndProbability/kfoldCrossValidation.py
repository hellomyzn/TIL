"""
K分割交差検証
"""

import numpy as np
from sklearn.model_selection import cross_val_score, train_test_split
from sklearn import datasets
from sklearn import svm

iris = datasets.load_iris()

"""
単一の訓練/テスト用のデータは、cross_validation libraryの
train_test_split関数で簡単に作ることができます。
"""

# Split the iris data into train/test data sets with 40% reserved for testing
X_train, X_test, y_train, y_test = train_test_split(
    iris.data, iris.target, test_size=0.4, random_state=0)

# Build an SVC model for predicting iris classifications using training data
clf = svm.SVC(kernel='linear', C=1).fit(X_train, y_train)

# Now measure its performance with the test data
clf.score(X_test, y_test)

"""
K分割交差検証も同様に簡単です。Kに5を設定します。
"""

# We give cross_val_score a model, the entire data set and its
# "real" values, and the number of folds:
scores = cross_val_score(clf, iris.data, iris.target, cv=5)

# Print the accuracy for each fold:
print(scores)

# And the mean accuracy of all 5 folds:
print(scores.mean())


"""
いい結果ですね。さらに良くすることは可能でしょうか。異なるカーネル（多項式）を試してみましょう。
"""

clf = svm.SVC(kernel='poly', C=1).fit(X_train, y_train)
scores = cross_val_score(clf, iris.data, iris.target, cv=5)
print(scores)
print(scores.mean())

"""
より複雑な多項式のカーネルは、シンプルな線形のカーネルよりも正確性を下げるようです。
多項式のカーネルは過剰適合のようです。しかしながら、
多項式のカーネルであっても単一の訓練/テストでは過剰適合しないようです。
"""

# Build an SVC model for predicting iris classifications using training data
clf = svm.SVC(kernel='poly', C=1).fit(X_train, y_train)

# Now measure its performance with the test data
clf.score(X_test, y_test)   

"""
線形のカーネルを用いた単一の訓練/テストと同じスコアですね。
"""
