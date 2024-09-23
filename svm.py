from IPython.display import Image, YouTubeVideo
import numpy as np
import matplotlib.pyplot as plt

from sklearn import datasets
from sklearn.svm import SVC
from sklearn.cross_validation import train_test_split
from sklearn import metrics
from sklearn import svm

url = 'https://upload.wikimedia.org/wikipedia/commons/2/20/Svm_separating_hyperplanes.png'
Image(url, width=450)
"""
サポートベクターマシン (SVM)は、サンプル群を上手に分類する境界線を見つけようとする方法です。
多クラス分類にも利用可能です。

目次
Part 1: SVMの原理
Part 2: カーネル法
Part 3: その他の資料
Part 4: scikit-learnでSVM
Part 1: SVMの原理
まずは、SVMのおおまかな原理を掴んでいきましょう。

"""


"""
Part 2: カーネル法¶
いつも超平面で分離できるとは限りません。そんな時、役に立つのがカーネル法と呼ばれる、工夫です。
"""

# 特徴量空間におけるカーネルトリック
url = 'http://i.imgur.com/WuxyO.png'
Image(url)
# カーネル法がよく分かる動画です。
YouTubeVideo('3liCbRZPrZA')


"""
Part 3: その他の資料
英語になってしまいますが、その他の資料を挙げておきます。
"""

# Andrew Ng先生の講義
YouTubeVideo('qdnT_jGTg2s')


# MITの講義
YouTubeVideo('_PwhiWxHK8o')

"""
Part 4: scikit-learnを使ったSVMの実際
"""


iris = datasets.load_iris()
X = iris.data
Y = iris.target
print(iris.DESCR)
"""
パラメータについて、ドキュメントを参照してみてください。
SVC (Support Vector Classification)
SVM library of Sci Kit Learn
"""

model = SVC()

X_train, X_test, Y_train, Y_test = train_test_split(X, Y, random_state=3)
model.fit(X_train, Y_train)

predicted = model.predict(X_test)
expected = Y_test
print(metrics.accuracy_score(expected, predicted))


"""

非常に高い予測精度が得られました。
デフォルトでは、RBFカーネルが使われています。
それぞれのカーネルの違いをscikit-learnのドキュメントに詳しく載っています。
これを自分で作る方法を書いておきますので、興味がある方はやってみてください。
http://scikit-learn.org/stable/modules/svm.html#svm-classification
"""

# 図示できるのが2次元までなので、変数を2つに絞ります。
X = iris.data[:, :2]
Y = iris.target

# SVMの正則化パラメータです。
C = 1.0
# SVC with a Linear Kernel
svc = svm.SVC(kernel="linear", C=C).fit(X, Y)
# Gaussian Radial Bassis Function
rbf_svc = svm.SVC(kernel="rbf", gamma=0.7, C=C).fit(X, Y)
# SVC with 3rd degree poynomial
poly_svc = svm.SVC(kernel='poly', degree=3, C=C).fit(X, Y)
# SVC Linear
lin_svc = svm.LinearSVC(C=C).fit(X, Y)


# step size
h = 0.02

# X軸の最大最小
x_min = X[:, 0].min() - 1
x_max = X[:, 0].max() + 1

# Y軸の最大最小
y_min = X[:, 1].min() - 1
y_max = X[:, 1].max() + 1

# meshgridを作ります。
xx, yy = np.meshgrid(np.arange(x_min, x_max, h), np.arange(y_min, y_max, h))

titles = ['SVC with linear kernel',
          'LinearSVC (linear kernel)',
          'SVC with RBF kernel',
          'SVC with polynomial (degree 3) kernel']


for i, clf in enumerate((svc, lin_svc, rbf_svc, poly_svc)):

    # 境界線を描画します。
    plt.figure(figsize=(15,15))
    plt.subplot(2, 2, i + 1)

    plt.subplots_adjust(wspace=0.4, hspace=0.4)

    Z = clf.predict(np.c_[xx.ravel(), yy.ravel()])

    Z = Z.reshape(xx.shape)

    plt.contourf(xx, yy, Z, cmap=plt.cm.terrain, alpha=0.5,linewidths=0)

    plt.scatter(X[:, 0], X[:, 1], c=Y, cmap=plt.cm.Dark2)

    plt.xlabel('Sepal length')
    plt.ylabel('Sepal width')
    plt.xlim(xx.min(), xx.max())
    plt.ylim(yy.min(), yy.max())
    plt.xticks(())
    plt.yticks(())
    plt.title(titles[i])



plt.show()
