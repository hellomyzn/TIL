import numpy as np
import pandas as pd
import matplotlib.pyplot as plt
import seaborn as sns
import sklearn
from sklearn.linear_model import LinearRegression
from sklearn.cross_validation import train_test_split
from IPython.display import Image
from pandas import Series, DataFrame
from sklearn.datasets import load_boston
sns.set_style("whitegrid")

"""
機械学習に関する資料¶
1.) SciKit Learnのドキュメントは、英語になってしまいますが秀逸です。
SciKit Learn Tutorial
2.) 数少ない日本語の入門コースです 技術評論社のページ
3.) sasという会社さんのページですが、よくまとまっています。機械学習
4.) 英語になってしまいますが、Andrew Ng先生の講義です。
notes
Coursera Video
Pythonやscikit learnは使っていませんが、数学的な背景についてはよい入門になっています。
"""

"""

線形回帰（教師有り学習）
ここから始まるレクチャーでは、線形回帰について学びます。 scikit-learnを使って、
線形回帰のモデルを作り、新しいデータを使った予測を試みます。 サンプルデータは、
アメリカの大都市ボストンの住宅価格です。初めは、1つだけの変数を使った単回帰をやってみます。

線形回帰の数学的な背景に興味がある場合は、以下のサイトが参考になります。
wikipedia（日本語）
wikipedia（英語）
Andrew Ngの動画（英語）もあります youtube.
4回に分かれているレクチャーの概要です。
Step 1: データの準備
Step 2: ひとまず可視化
Step 3: 最小二乗法の数学的な背景
Step 4: Numpyを使った単回帰
Step 5: 誤差について
Step 6: scikit-learnを使った重回帰分析
Step 7: 学習（Training）と検証Validation）
Step 8: 価格の予測
Step 9 : 残差プロット
Step 1: データの準備
scikit-learnに用意されているサンプルデータを使います。
"""

"""
Step 1: データの準備
scikit-learnに用意されているサンプルデータを使います。
"""

boston = load_boston()
print(boston.DESCR)
"""
Step 2: ひとまず可視化
未知のデータを入手したときは、データを可視化して、その概要を確認するのは重要です。
"""
plt.hist(boston.target, bins=50, edgecolor="k")
# # 価格のヒストグラムです。 (これがモデルを作って、最終的に予測したい値です。）
plt.xlabel('Price in $1,000s')
plt.ylabel('Number of houses')
plt.show()


# ラベルがRMになっている5番目の列が、部屋の数です。
plt.scatter(boston.data[:, 5], boston.target)
plt.ylabel('Price in $1,000s')
plt.xlabel('Number of rooms')
plt.show()
# 予想通り、部屋数が増えれば、価格は上がります。 ここで、pandas.DataFrameとseabornを導入します。


boston_df = DataFrame(boston.data)
boston_df.head()
boston_df.columns = boston.feature_names
boston_df.head()
boston_df['Price'] = boston.target

# ひとまず完成です。

boston_df.head()

# lmplotを使って、回帰直線を引きます。
sns.lmplot('RM', "Price", data=boston_df, scatter_kws={"edgecolor": "k"})
plt.show()

# 数学的に複雑なモデルが欲しいときは、これでは少し力不足なので、scikit-learnの使い方を学ぶ事にします。


"""
Step 3: 最小二乗法の数学的な背景
回帰直線の係数を求めるのに使われる、「最小二乗法」について、すこし数学的になりますが、
その背景を説明します。
回帰直線は、データ全体にうまく適合するように、描かれています。各点から、
回帰直線への距離をDとしてみましょう。このDを最小にすれば良いわけです。このイメージを図にしてみます。
"""

url = 'http://upload.wikimedia.org/wikipedia/commons/thumb/b/b0/Linear_least_squares_example2.svg/220px-Linear_least_squares_example2.svg.png'
Image(url)

"""

各点（赤）の座標は、(x, y)です。ここから、回帰直線（青線）への距離をDとすると、
以下の値を最小にする直線が一番よさそうです。

d = D*2/1 + D*2/2 + D*2/3 + D*2/4 + ....+ D*2/N
d=D12+D22+D32+D42+....+DN2

直線の式は、
y=ax+b
y=ax+b

で表現されます。いま、 aa と bb を求めたいのですが、これはdを最小にする aa と bb を
見つけ出すという問題と同じです。

この問題はもちろん、手で計算することで解くことができますが、ここではこの計算をNumpyやscikit-leranに
お任せします。 もし数学的な計算方法に興味がある方は、こちらが大変参考になります。
http://mathtrain.jp/seikiequ
"""


"""
Step 4: Numpyを使った単回帰
Numpyは線形代数のライブラリの一部に、最小二乗法を解く関数を持っています。
まずはこれを使って、単回帰(説明変数が1つ）をやってみます。その後、scikit-learnを使って、
重回帰（説明変数が複数）に進んで行きましょう。

入力として、2つのarray（XとY）を用意します。
Yは目的変数なので1次元のarrayですが、Xは2次元のarrayで、行がサンプル、列が説明変数です。
単回帰の場合は、列が1つになりますですので、そのshapeは、(506,1)です。これを作るには、
いくつか方法がありますが、ここでは、vstackを使ってみます。
"""

# 部屋数
X = boston_df.RM
print(X.shape)
X
# これを2次元のarrayにします。
X = np.vstack(boston_df.RM)
print(X.shape)
X

Y = boston_df.Price
print(Y.shape)

"""

numpyで単回帰をするには、ここから、少しだけ工夫が必要です。
直線の式は、
y=ax+b

これは、次のように書き直すことができます。
y=Ap

ただし:
A=[ x 1 ]

p=[ a/b ]
Aとpはベクトルで、これらの内積で直線の式を表現しただけです。
データをこの形式に変更する必要があるので、次のようなコードを実行します
"""


# Xを[X 1]の形にします。
X = np.array([[value, 1] for value in X])
# 最小二乗法の計算を実行します。
a, b = np.linalg.lstsq(X, Y)[0]
# まずは元のデータをプロットします。
plt.plot(boston_df.RM, boston_df.Price, 'o')
# 求めた回帰直線を描きます。
x = boston_df.RM
plt.plot(x, a * x + b, 'r')
plt.show()

"""

Step 5: 誤差について
Pythonを使って、最小二乗法を用いて、単回帰を実行出来ました。 すべてのデータが完全に乗る直線を
描くことは出来ませんので、どうしても誤差が出ます。
最小化しているのは、誤差の2乗和でした。ですので、全体の誤差が分かれば、それをサンプルの数で
割って、平方根をとることで、ちょうど標準偏差のようなイメージで、平均誤差を計算できます。
numpy.linalg.lstsqのドキュメント（英語）
https://docs.scipy.org/doc/numpy/reference/generated/numpy.linalg.lstsq.html
"""

X.shape
Y.shape
result = np.linalg.lstsq(X, Y)

# 2つ目の要素に、誤差の合計が入っています。
error_total = result[1]

# 誤差の平均値の平方根を計算します。
rmse = np.sqrt(error_total / len(X))

print('平均二乗誤差の平方根は、{:0.2f}'.format(rmse[0]))

"""
平均二乗誤差は、標準偏差に対応するので、95%の確率で、この値の2倍以上誤差が広がることは
無いと結論付けあれます。 正規分布の性質を思い出したい方は、こちらを参照.
https://en.wikipedia.org/wiki/68%E2%80%9395%E2%80%9399.7_rule

Thus we can reasonably expect a house price to be within $13,200
of our line fit.

Step 6: scikit-learnを使った重回帰分析
それでは、重回帰へと話を進めましょう。 説明変数が1つだけだと単回帰ですが、
重回帰は複数の説明変数を同時に扱うことができます。
scikit-learnの線形回帰ライブラリを利用します。 linear regression library
http://scikit-learn.org/stable/modules/generated/sklearn.linear_model.LinearRegression.html
sklearn.linear_model.LinearRegressionクラスは、データを元にモデルを作り、
予測値を返すことができます。 モデルを作る時には、fit()メソッドを呼び、予測をするときは、
predict()メソッドを使います。 今回は重回帰モデルを使いますが、他のモデルも同じように、
fitとpredictメソッドを実装しているところが、scikit-learnの便利なところです。
"""

lreg = LinearRegression()
"""
lreg.fit() はデータを元にモデルを作ります。
lreg.predict() は作られたモデルを元に、予測値を返します。
lreg.score()は、決定係数を返します。 決定係数は、説明変数でどれくらいうまく目的変数の値を
説明出来ているかの指標になります。Wikipediaへのリンク
https://ja.wikipedia.org/wiki/%E6%B1%BA%E5%AE%9A%E4%BF%82%E6%95%B0
ボストンの住宅価格を、目的変数と説明変数に分けます。
"""


# 説明変数
X_multi = boston_df.drop('Price', 1)
boston_df.head()
X_multi.head()
# 目的変数
Y_target = boston_df.Price
lreg.fit(X_multi, Y_target)
print('切片の値は{:0.2f}'.format(lreg.intercept_))
print('係数の数は{}個'.format(len(lreg.coef_)))

"""

単回帰の時は、直線だったので、係数aと切片bはともに1つでした。今は、切片は1つですが、
係数が13個あります。これは13個変数がある式になっている事を意味しています。
y = b + a1x1 + a2x2 + ⋯ + a13x13

実際に求められた係数を見ていきましょう。
"""

# 新しいDataFrameを作ります。
coeff_df = DataFrame(boston_df.columns)
coeff_df.columns = ['Features']
# 求められた係数を代入します。
coeff_df["Coefficient Estimate"] = pd.Series(lreg.coef_)
coeff_df
"""
部屋の数（RM）の係数が一番大きいことが分かります。
"""


"""

Step 7: 学習（Training）と検証（Validation）
ここまではすべてのデータを使って来ましたが、一部のデータを使って、モデルを作り、
残りのデータを使って、モデルを検証するということができます。

サンプルをどのように分けるかが問題ですが、scikit-learnに便利な関数 train_test_split
があるので、使って見ましょう。

サンプルを学習用のtrainと検証用のtestに分けてくれます。追加のパラメータを渡せば、
割合も調整できます。 詳しくはこちら

"""

X_train, X_test, Y_train, Y_test = train_test_split(X_multi, boston_df.Price)
print(X_train.shape, X_test.shape, Y_train.shape, Y_test.shape)


"""
Step 8: 価格の予測
それでは、学習用のデータを使ってモデルを作り、残りのデータを使って、住宅価格を予測してみましょう。
"""
lreg = LinearRegression()
lreg.fit(X_train, Y_train)

pred_train = lreg.predict(X_train)
pred_test = lreg.predict(X_test)
pred_train
pred_test
print('X_trainを使ったモデルの平均二乗誤差＝{:0.2f}'.format(
    np.mean((Y_train - pred_train) ** 2)))

print('X_testを使ったモデルの平均二乗誤差＝{:0.2f}'.format(
    np.mean((Y_test - pred_test) ** 2)))

"""
X_trainを使って作ったモデルですので、X_testのデータを使ってYを計算すると、
実際の値からのズレが大きくなります。

"""

"""

Step 9 : 残差プロット
回帰分析では、実際に観測された値と、モデルが予測した値の差を、残差と呼びます。
残差=観測された値−予測された値
残差=観測された値−予測された値

横軸に予測値、縦軸に実際の値との差をプロットしたものを、残差プロットと呼びます。
残差プロットを描いて、多くのデータがy=0の直線に近いところに集まれば、よいモデルが出来たことが
わかります。 また、均一に点がプロットされている場合、線形回帰が適切だったことが分かります。
そうでは無い場合は、非線形なモデルを使うことを検討しましょう。（これは後のレクチャーで解説します。）
"""


# 学習用のデータの残差プロットです。
train = plt.scatter(pred_train, (pred_train - Y_train), c='b', alpha=0.5)

# テスト用のデータの残差プロットです。
test = plt.scatter(pred_test, (pred_test - Y_test), c='r', alpha=0.5)

# y=0の水平な線を描いておきます。
plt.hlines(y=0, xmin=-10, xmax=50)

plt.legend((train, test), ('Training', 'Test'), loc='lower left')
plt.title('Residual Plots')
plt.show()

"""
y=0の回りに、残差がランダムにばらけているように見えますので、モデルは良かったと言えそうです。
右下に直線上に並んだデータに関して調べて見るのは、興味深いかもしれません。
英語になってしまいますが、scikit-learnのドキュメントには有用な情報が沢山あります。
是非チェックしてみてください。
http://scikit-learn.org/stable/modules/linear_model.html#linear-model
"""
