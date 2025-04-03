"""
ナイーブベイズ分類
Part 1: 数学的な準備
Part 2: ベイズの定理
Part 3: ナイーブベイズの紹介
Part 4: 数学的な背景
Part 5: 確率を使った分類
Part 6: Gaussian Naive Bayes
Part 7: Scikit Learnを使ったGaussian Naive Bayes
"""

"""

Part 1: 数学的な準備
まずは足し算で使われるΣの、かけ算バージョン、Πについてです。

 4
 ∏ i=1⋅2⋅3⋅4,
i=1

 4
 ∏ i=24,
i=1

https://ja.wikipedia.org/wiki/Arg_max
与えられた関数を最大にする入力（定義域）を次のような記号で書くことがあります。

arg max f(x) := { x ∣ ∀y : f(y) ≤ f(x) }
    x

例えば、f(x)が 1−|x| なら、この関数を最大にするxは0になります。
arg max ( 1 − |x| ) = { 0 }
    x
"""


"""
Part 2: ベイズの定理

統計に関して解説した付録のなかに、ベイズの定理を紹介したレクチャーがありますので、
そちらを先にご覧ください。


Part 3: ナイーブベイズの紹介

ナイーブベイズ（Naive Bayes）は、スパムメールの分類などに実際に利用されている機械学習
アルゴリズムです。ただ、その背景を完全に理解するには、数学的な記述が欠かせません。ここでは、
細かいところを省略しながら、その本質をご紹介します。


Part 4: 数学的な背景

yが目的変数、説明変数が x1 から xn まであるとします。ベイズの定理を使うと、
与えられた説明変数を元に、そのサンプルがどのクラスに属するかの確率を次のような式で計算できます。

P( y ∣ x1, … , xn ) = P(y) P( x1, …xn ∣ y ) / P( x1, …, xn )

ナイーブベイズのナイーブは、各説明変数が互いに独立であるという仮定から来ています。

P( xi | y, x1, …, xi−1, xi+1, …, xn ) = P( xi|y )


この仮定のもとでは、すべての i について、式を次のように変形できます。

                         n
P( y ∣ x1, …, xn ) = P(y)∏ P( xi ∣ y ) / P( x1, …, xn )
                        i=1


それぞれの変数について、クラスごとの確率を求めればよいので、計算が楽になります。


Part 5: 確率を使った分類

ナイーブベイズでは、それぞれのクラスに属する確率が計算されるので、最終的には、そのサンプルを、
確率が最も大きいクラスに分類します。ここで、arg maxの記号が出てくる分けです。

P(x1, ..., xn) は手元のデータセットに関しては一定の値なので、無視できます。

                        n
P( y ∣ x1, …, xn ) ∝P(y)∏ P( xi ∣ y )
                       i=1

最終的には、もっとも大きな確率が割り当たるクラスに、サンプルを分類します。

                 n
ŷ = arg max P(y) ∏ P( xi ∣ y ),
         y      i=1

Part 6: Gaussian Naive Bayes

説明変数が連続値の場合、これを正規分布に従うものとしてモデル化すると、
モデルの構築や計算が楽にです。サンプルデータのアヤメのデータも連続値ですので、
後ほどの、Gaussian Naive Bayesを利用します。
                     _______
p( x = v|c ) ={ 1 / √(2πσ)c^2 } e^ −(v−μc)^2 / (2σ)c ^2


Part 7: Scikit learnを使ったGaussian Naive Bayes

"""

import pandas as pd
from pandas import Series, DataFrame

import matplotlib.pyplot as plt
import seaborn as sns

# Gaussian Naive Bayes のためのコード
from sklearn import datasets
from sklearn import metrics
from sklearn.naive_bayes import GaussianNB
from sklearn.cross_validation import train_test_split

iris = datasets.load_iris()
X = iris.data
Y = iris.target
print(iris.DESCR)
model = GaussianNB()
X_train, X_test, Y_train, Y_test = train_test_split(X, Y, random_state=0)
model.fit(X_train, Y_train)
predicted = model.predict(X_test)
expected = Y_test
print(metrics.accuracy_score(expected, predicted))


"""

Part 8: More Resources
There are plenty more resources and types of Naive Bayes Classifiers,
For more resources on Naive Bayes, check out the following links:
1.) SciKit Learn Documentation
http://scikit-learn.org/stable/modules/naive_bayes.html
2.) Wikipedia Naive Bayes
https://ja.wikipedia.org/wiki/%E5%8D%98%E7%B4%94%E3%83%99%E3%82%A4%E3%82%BA%E5%88%86%E9%A1%9E%E5%99%A8
"""
