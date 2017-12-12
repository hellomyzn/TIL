import numpy as np
import pandas as pd
from IPython.display import Image, YouTubeVideo
from pandas import Series, DataFrame

import matplotlib.pyplot as plt
import seaborn as sns
sns.set_style('whitegrid')

from sklearn import linear_model
from sklearn.datasets import load_iris
from sklearn.linear_model import LogisticRegression
from sklearn.cross_validation import train_test_split
from sklearn import metrics
# K近傍法
from sklearn.neighbors import KNeighborsClassifier
"""
    ロジスティック回帰では、データを2つのクラスに分類する方法を学びました。しかし、
    実社会ではサンプルが3つ以上のクラスに分けられる問題も多くあります。

    ここからのレクチャーでは、こうした問題に対応出来る、多クラス分類の方法を学びます。
    1.) Iris（アヤメ）データの紹介
    2.) ロジスティック回帰を使った多クラス分類の紹介
    3.) データの準備
    4.) データの可視化
    5.) scikit-learnを使った多クラス分類
    6.) K近傍法（K Nearest Neighbors）の紹介
    7.) scikit-learnを使ったK近傍法
    8.) まとめ

    Step 1: Iris（アヤメ）のデータ
    機械学習のサンプルデータとして非常によく使われるデータセットがあります。
    それが、Iris（アヤメ）のデータ です。
    https://en.wikipedia.org/wiki/Iris_flower_data_set

    このデータセットは、イギリスの統計学者ロナルド・フィッシャーによって、1936年に紹介されました。
    3種類のアヤメについて、それぞれ50サンプルのデータがあります。それぞれ、
    Iris setosa、Iris virginica、Iris versicolorという名前がついています。
    全部で150のデータになっています。4つの特徴量が計測されていて、これが説明変数になります。
    4つのデータは、花びら（petals）と萼片（sepals）の長さと幅です。
    https://ja.wikipedia.org/wiki/%E8%90%BC
"""

url = 'http://upload.wikimedia.org/wikipedia/commons/5/56/Kosaciec_szczecinkowaty_Iris_setosa.jpg'
Image(url, width=300, height=300)
url = 'http://upload.wikimedia.org/wikipedia/commons/4/41/Iris_versicolor_3.jpg'
Image(url, width=300, height=300)

url = 'http://upload.wikimedia.org/wikipedia/commons/9/9f/Iris_virginica.jpg'
Image(url, width=300, height=300)

"""
    データの概要をまとめておきましょう。
    3つのクラスがあります。
    Iris-setosa (n=50)
    Iris-versicolor (n=50)
    Iris-virginica (n=50)

    説明変数は4つです。
    萼片（sepal）の長さ（cm）
    萼片（sepal）の幅（cm）
    花びら（petal）の長さ（cm）
    花びら（petal）の幅（cm）
"""


"""
    Step 2: 多クラス分類の紹介

    最も基本的な多クラス分類の考え方は、「1対その他（one vs all, one vs rest）」
    というものです。 複数のクラスを、「注目するクラス」と「その他のすべて」に分けて、
    この2クラスについて、ロジスティック回帰の手法を使います。

    どのクラスに分類されるかは、回帰の結果もっとも大きな値が割り振られたクラスなります。
    後半では、K近傍法という別の方法を紹介します。
"""

YouTubeVideo("Zj403m-fjqg")

"""
Step 3: データの準備
"""


iris = load_iris()
X = iris.data
Y = iris.target
print(iris.DESCR)

X
Y

iris_data = DataFrame(
    X, columns=['Sepal Length', 'Sepal Width', 'Petal Length', 'Petal Width'])
iris_data

iris_target = DataFrame(Y, columns=['Species'])
iris_target


def flower(num):
    if num == 0:
        return "Setosa"
    elif num == 1:
        return "Veriscolour"
    else:
        return "Virginica"


iris_target['Species'] = iris_target['Species'].apply(flower)

iris_target.head()
iris = pd.concat([iris_data, iris_target], axis=1)
iris.head()

"""

Step 4: データの可視化
pairplotを使えば、簡単に全体像を把握できます。
"""

sns.pairplot(iris, hue="Species", size=3)
plt.show()

"""
全体像がよくわかります。
特徴量でアヤメの種類を予測できそうです。特に、Setosaは最も特徴的な花のようです。
次に、花びらの長さに注目して、ヒストグラムを描いてみましょう。
"""

plt.figure(figsize=(12, 4))
sns.countplot('Petal Length', data=iris, hue='Species')
plt.show()


"""
その他の特徴量についても、可視化してみてください。
1対その他の方法論で、ロジスティック回帰を使った多クラス分類の挑戦してみましょう。
"""


"""
Step 5: scikit-learnを使った多クラス分類
すでに説明変数Xと、目的変数Yが用意されているので、これを使って解析を進めて行きます。
データを学習用とテストように分けておきましょう。全体の40％がテストデータになるようにします。
"""

logreg = LogisticRegression()
# データを分割します。テストが全体の40%になるようにします。
X_train, X_test, Y_train, Y_test = train_test_split(
    X, Y, test_size=0.4, random_state=3)
# データを使って学習します。
logreg.fit(X_train, Y_train)
X_pred = logreg.predict(X_test)
print(metrics.accuracy_score(Y_test, X_pred))

"""
93%と高い精度が得られました。random_stateを指定すれば、再現性がある結果を得ることができます。
次に、K近傍法に進んで行きましょう。
"""

"""

Step 6: K近傍法
K近傍法は英語で、k-nearest neighborなので、kNNと略されることもありますが、
極めてシンプルな方法論です。

学習のプロセスは、単純に学習データを保持するだけです。新しいサンプルが、
どちらのクラスに属するかを予測するときにだけ、すこし計算をします。

与えられたサンプルのk個の隣接する学習データのクラスを使って、このサンプルのクラスを予測します。
イメージをうまく説明した図がこちら。
"""

Image('http://bdewilde.github.io/assets/images/2012-10-26-knn-concept.png',
      width=400, height=300)

"""

★が新しいサンプルです。これを中心に、既存のサンプルのクラスを見ていきます。K=3ではAが1つ、
Bが2つなので、分類されるクラスは、Bです。K=6とすると、A4つ、B2つなので、Aと判別されます。

Kの選び方によっては、同数になってしまうことがあるので注意が必要です。（アルゴリズムの中で、
これを解決する方法論が実装されていることが多いです。）

Step 7: scikit-learnを使ったkNN

Irisデータを使って、実際のPythonコードを見ていきましょう。
"""

# k=6からはじめてみます。
# インスタンスを作ります。
knn = KNeighborsClassifier(n_neighbors=6)
knn.fit(X_train, Y_train)
X_pred = knn.predict(X_test)
print(metrics.accuracy_score(Y_test, X_pred))
"""
95%の精度が得られました。k=1にするとどうなるでしょうか？もっとも近いサンプルのクラスを予測値とする方法です。
"""


knn = KNeighborsClassifier(n_neighbors=1)
knn.fit(X_train, Y_train)
X_pred = knn.predict(X_test)
print(metrics.accuracy_score(Y_test, X_pred))

"""
kを変化させるとどうなるでしょうか？
"""


# kを変化させてみましょう。
k_range = range(1, 90)
accuracy = []

# 先ほどの計算を繰り返して見ましょう。
for k in k_range:
    knn = KNeighborsClassifier(n_neighbors=k)
    knn.fit(X_train, Y_train)
    Y_pred = knn.predict(X_test)
    accuracy.append(metrics.accuracy_score(Y_test, Y_pred))
k_range
len(accuracy)
plt.plot(k_range, accuracy)
plt.xlabel('K for kNN')
plt.ylabel('Testing Accuracy')
plt.show()


"""

学習用のデータとテスト用のデータを分けるやり方を変えると、これらの結果がどうなるか、
検討してみるのも面白いかもしれません。

Step 8: まとめ
ロジスティック回帰とk近傍法を使った多クラス分類について学びました。
英語になりますが、参考資料をいくつかあげておきます。
1.) Wikipedia on Multiclass Classification
https://en.wikipedia.org/wiki/Multiclass_classification
2.) MIT Lecture Slides on MultiClass Classification
http://www.mit.edu/~9.520/spring09/Classes/multiclass.pdf
3.) Sci Kit Learn Documentation
http://scikit-learn.org/stable/modules/multiclass.html
4.) DataRobot on Classification Techniques
https://www.datarobot.com/blog/classification-with-scikit-learn/
