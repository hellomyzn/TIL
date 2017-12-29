from sklearn.cross_validation import train_test_split
from sklearn.neighbors import KNeighborsClassifier
from sklearn.metrics import accuracy_score
from sklearn.datasets import load_digits
import numpy as np
import matplotlib.pyplot as plt
import pandas as pd

# データセットの読み込み
digits = load_digits(n_class=10)
digits.images.shape


plt.axis('off')
plt.imshow(digits.images[0], cmap="gray_r")
plt.show()
type(digits.images)
hoge = np.array([[[0, 1, 2], [10, 11, 12], [20, 21, 22]], [[3, 4, 5], [
    13, 14, 15], [23, 24, 25]], [[6, 7, 8], [16, 17, 18], [26, 27, 28]]])
hoge.shape
hoge = pd.DataFrame(hoge.reshape(3, 9))


hoge


pd.DataFrame(digits.images[4])
len(digits.images[0])
pd.DataFrame(digits.data)

print(digits.target.shape)
print(digits.target_names.shape)
print(np.unique(digits.target))


X = digits.data
# クラスラベルの取得
y = digits.target
# データセットの分割
X_train, X_test, y_train, y_test = train_test_split(
    X, y, test_size=0.3, random_state=0)

X_train.shape
y_train.shape

knn = KNeighborsClassifier(n_neighbors=5)

knn.fit(X_train, y_train)

y_train_pred = knn.predict(X_train)
y_train_pred
score = accuracy_score(y_train_pred, y_train)
print('トレーニングデータ正答率 : ', str(score))


y_test_pred = knn.predict(X_test)

score = accuracy_score(y_test_pred, y_test)
print('トレーニングデータ正答率 : ', str(score))

print(X_test.shape)
# => (540, 64)
# 画像を2次元に戻す
X_test_images = X_test.reshape(540, 8, 8)
print(X_test_images.shape)
# => (540, 8, 8)

# 10個のデータを出力する
for i in range(10):
    # 軸を表示しない
    plt.axis('off')
    plt.imshow(X_test_images[i], cmap='gray_r')
    # 予測した数字と実際の画像を縦に並べる
    plt.title('pred' + str(y_test_pred[i]))
    plt.show()

plt.plot(digits.data)
