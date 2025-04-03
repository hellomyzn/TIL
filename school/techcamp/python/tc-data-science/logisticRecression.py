import numpy as np
import pandas as pd
from pandas import Series, DataFrame

import math

# プロット用
import matplotlib.pyplot as plt
import seaborn as sns
sns.set_style('whitegrid')

# 機械学習用
from sklearn.linear_model import LogisticRegression
from sklearn.cross_validation import train_test_split

# もう一つ、性能評価用
from sklearn import metrics

# エラーが出たらセットアップをお願いします
import statsmodels.api as sm

"""
ここから4回のレクチャーでは、ロジスティック回帰を扱います。目的変数が0または1の2値になる回帰を、
ロジスティック回帰と呼びます。

0と1という数字自体には意味はありません。2値であるというところが重要です。例えば、
ある電子メールが、「スパム」か「スパムでない」かや、腫瘍が「悪性」か「良性」かなどを予測する
イメージです。この分類を行うために、ロジスティック関数を使います。

次の内容について学んで行きます。
1. ロジスティック関数の基本
2. その他の資料
3. データの準備
4. データの可視化
5. データの前処理
6. 多重共線性（Multicollinearity）について
7. scikit-learnを使ったロジスティック回帰
8. 学習とテスト
9. その他の話題
準備
Statsmodels
ここで新しいモジュールである Statsmodels が必要になります。
Anacondaを利用している場合は、すでにセットアップされている可能性もありますが、
インポートでエラーが出る場合は、

pip install statsmodels
または（Anacondaを使っている場合）
conda install statsmodels
として、セットアップしてください。
"""

"""
Part 1: 数学的な基礎
−∞から∞までの値を入力として受け取って、常に0から1の間の値を返す関数を考えます。
これをロジスティック関数（シグモイド関数＊）と呼びます。

シグモイド関数
https://ja.wikipedia.org/wiki/%E3%82%B7%E3%82%B0%E3%83%A2%E3%82%A4%E3%83%89%E9%96%A2%E6%95%B0
Logistic Function（英語）
https://en.wikipedia.org/wiki/Logistic_function

式で描くとこんな感じです。
δ(t) = 1 / 1 + e^-t

＊シグモイド関数は、ロジスティック関数の一種です。
式では分からないので、グラフを描いてみましょう。
"""

# ロジスティック関数


def logistic(t):
    return 1.0 / (1 + math.exp((-1.0) * t))


# tを-6 から 6まで 500 点用意します。
t = np.linspace(-6, 6, 500)

# リスト内包表記で、yを用意します。
y = np.array([logistic(ele) for ele in t])
# プロットしてみましょう。
plt.plot(t, y)
plt.title('LogisticFunction')
plt.show()

"""

ロジスティック回帰の数学的な、線形回帰よりすこし複雑です。なので、ここでは詳細な説明は省いて、
イメージだけ掴むようにしてみましょう。
元のデータ xx に対して、新しい（潜在的な）変数 tt を導入します。以下のような式を考えて見ましょう。

t = β0 + β1x

これは、単回帰モデルの式と同じです。説明変数が複数あるなら、重回帰と同じになります。
これを使って、ロジスティック関数を次のように書き換えてみます。

F(x) = 1 / 1 + e^ -(β0 + β1x)

何らかの方法を使って、もとのデータ xx から、 β0β0 や β1β1 を推定したいところです。
実は、ロジスティック回帰の場合、線形回帰のときの正規方程式のように、
解けば答えが見付かる形には出来ません。数値的な最適化の計算で、パラメータ ββ を
推定することになります。実際には、この部分はscikit-learnがやってくれます。数学的な背景に
興味がある方は、以下の資料や、このレクチャーの最後で紹介する資料などを参考にして見てください。
F(x)F(x) が0から1までの値しかとらないため、確率を同じだと考える事が出来る点は、
1つのポイントになります。

"""


"""
Part 2: その他の資料¶
もう少し詳しく学んで見たい場合は、次のような資料が役に立つかも知れません。
ロジスティック回帰の解説 技術評論社のページです
http://gihyo.jp/dev/serial/01/machine-learning/0018
Andrew Ng's class notes（英語） 16ページ目からがLogistic Regressionの解説です。
http://cs229.stanford.edu/notes/cs229-notes1.pdf
CMU notes（英語）
http://www.stat.cmu.edu/~cshalizi/uADA/12/lectures/ch12.pdf
Wikipedia（英語） 非常に丁寧な解説です。
https://en.wikipedia.org/wiki/Logistic_regression
"""


"""
Part 3: データの準備

今回使うサンプルデータは こちら
http://www.statsmodels.org/stable/datasets/generated/fair.html

Statsmodelsの一部として提供されているもので、1974年に行われた、
女性に対する調査です。何の調査かというと、結婚している女性に対する、所謂不倫の有無を聞いた調査です。

元のデータは論文になっているの次のリンクから内容を確認することができます。
Fair, Ray. 1978. “A Theory of Extramarital Affairs,” Journal of Political
Economy, February, 45-61.
https://fairmodel.econ.yale.edu/rayfair/pdf/1978a200.pdf

自己申告なので、データに嘘が含まれる可能性は十分にあります。このデータを選んだことにもちろん
他意はありません。（元のコースで使われて居たデータをそのまま利用しました）

不倫の有無という点だけに注目して、このデータを使って、ロジスティック回帰について見ていくことにしましょう。

以下の問いに対する答えを探します。

それぞれの女性の属性から、不倫の有無を予測できるか？


データの概要
データの概要が、Statsmodelsのwebサイト にあります。
http://www.statsmodels.org/stable/datasets/generated/fair.html

Number of observations: 6366 Number of variables: 9 Variable name definitions:
rate_marriage   : How rate marriage, 1 = very poor, 2 = poor, 3 = fair,
                4 = good, 5 = very good
age             : Age
yrs_married     : No. years married. Interval approximations. See
                original paper for detailed explanation.
children        : No. children
religious       : How relgious, 1 = not, 2 = mildly, 3 = fairly,
                4 = strongly
educ            : Level of education, 9 = grade school, 12 = high
                school, 14 = some college, 16 = college graduate,
                17 = some graduate school, 20 = advanced degree
occupation      : 1 = student, 2 = farming, agriculture; semi-skilled,
                or unskilled worker; 3 = white-colloar; 4 = teacher
                counselor social worker, nurse; artist, writers;
                technician, skilled worker, 5 = managerial,
                administrative, business, 6 = professional with
                advanced degree
occupation_husb : Husband's occupation. Same as occupation.
affairs         : measure of time spent in extramarital affairs

詳細が知りたい方は、元の論文を参照してみてください。
Statsmodelsには他にもサンプルデータがありますので、是非使って見てください。

"""

"""
Part 4: データの可視化

まずは、データの概要を見ていきましょう。
"""

# 以下のコードで、データをロードできます。fairがデータセットの名前ですが、不倫を意味する英単語は'affair'です。
df = sm.datasets.fair.load_pandas().data
df.head()

"""
不倫の有無を0,1で表現する新しい列名「Had_Affair」を作りましょう。 affairsが0出なければ、
1。0ならそのままHad_Affairも0にします。
"""


def affair_check(x):
    if x != 0:
        return 1
    else:
        return 0


# applyを使って、新しい列用のデータを作りましょう。
df['Had_Affair'] = df['affairs'].apply(affair_check)
df
# 不倫の有無（Had_Affair列）でグループ分けします。
df.groupby('Had_Affair').mean()

"""
この簡単な解析からは、不倫したことがある女性は、若干年齢が上で、比較的長く結婚しており、
宗教観と学歴が少し低いことがわかります。 ただ、
平均値はグループ間で似たような値になっているのがわかります。

分かり易いように可視化してみましょう。
まずは、ヒストグラムから。
"""

# 年齢分布を見てみます。
sns.countplot('age', data=df.sort_values('age'),
              hue='Had_Affair', palette='coolwarm')
plt.show()
"""
年齢が上がると不倫率が上がる傾向が見えます。では、結婚してからの年月はどうでしょうか？
"""
sns.countplot('yrs_married', data=df.sort_values('yrs_married'),
              hue='Had_Affair', palette='coolwarm')
plt.show()
"""
やはり結婚から年月が経つと、不倫率が上がるようです。
子供の数はどうでしょうか？
"""

sns.countplot('children', data=df.sort_values('children'),
              hue='Had_Affair', palette='coolwarm')
plt.show()
"""
子供の数が少ないと、不倫率が低いはっきりとした傾向があります。
最後は学歴を見ておきましょう。
"""

sns.countplot('educ', data=df.sort_values('educ'),
              hue='Had_Affair', palette='coolwarm')
plt.show()


"""
数字が大きいほど高学歴ですが、あまり関係が無いように見えます。
他の列についてやってみるのもいいかもしれません。

引き続き、回帰モデルを作ることを目指します。
"""

"""

Part 5: データの前処理
データを見ていると、2つだけ別の列と違う性質のものがあります。Occupation と
Husband's Occupation です。 これは、それぞれ奥さんとご主人の職業ですが、
カテゴリー型のデータになっているので、数字の大小に意味がありません。

そこでこのような変数は、ダミー変数を導入して、その変数の0/1で表現し直すことを考えます。
pandasに便利な関数があるので、実際にやってみながら説明します。
"""


# カテゴリーを表現する変数を、ダミー変数に展開します。
occ_dummies = pd.get_dummies(df['occupation'])
hus_occ_dummies = pd.get_dummies(df['occupation_husb'])
occ_dummies

# もう少し読みやすいように、列名を付けて置きます。
occ_dummies.columns = ['occ1', 'occ2', 'occ3', 'occ4', 'occ5', 'occ6']
hus_occ_dummies.columns = ['hocc1', 'hocc2',
                           'hocc3', 'hocc4', 'hocc5', 'hocc6']
# 不要になったoccupationの列と、目的変数「Had_Affair」を削除します。
X = df.drop(['occupation', 'occupation_husb', 'Had_Affair'], axis=1)

# ダミー変数のDataFrameを繋げます。
dummies = pd.concat([occ_dummies, hus_occ_dummies], axis=1)
dummies.head()
X = pd.concat([X, dummies], axis=1)
X.head()

# Yに目的変数を格納します。
Y = df.Had_Affair
Y.head()


"""
Part 6: 多重共線性

ダミー変数を導入しましたが、ここで1つ注意点があります。
ダミー変数同士は高度に相関する可能性があります。

ダミー変数について
http://ocw.nagoya-u.jp/files/254/sonoda_kougi12.pdf

例えば、男女を表現するのに、maleとfemaleのダミー変数を導入したとします。maleが1なら
femaleは0、その逆も成り立ちます。このように、変数同士が、互いに高い相関を示すことを、
「多重共線性」と言ったりしますが、ダミー変数をすべて含めると、完全に相関する変数を回帰モデルに
入れることになります。

英語のWikipedia（multicollinearity）
https://en.wikipedia.org/wiki/Multicollinearity#Remedies_for_multicollinearity

ひとまず、ダミー変数から、occ1とhocc1を解析から取り除くことにします。
もう1つ、affairs列も、目的変数の元になっている変数なので、これも削除しておきましょう。
"""

X = X.drop('occ1', axis=1)
X = X.drop('hocc1', axis=1)
X = X.drop('affairs', axis=1)
X.head()

"""

最後に、Yを1次元のarrayにする必要があります。
np.ravelか、Y.valuesを使います。
"""

Y = Y.values
# または、
Y = np.ravel(Y)

Y


"""
Part 7: ScikitLearnを使ったロジスティック回帰

いよいよ、実際にロジスティック回帰を行いますが、前のレクチャーで学んだ、線形回帰に非常に
よく似ているので、分かり易いかもしれません。
"""

log_model = LogisticRegression()
log_model.fit(X, Y)
# モデルの精度を確認してみましょう。
log_model.score(X, Y)
# numpyのarrayなので、平均をすぐ計算できます。
Y.mean()
Y

"""

これは、作ったモデルが、常に「不倫していない（つまり0）」と出力すると、1-0.32=0.68 となり、
68%の精度が得られることになります。この値よりは、73％の方が高いことがわかります。

さて次に、どの変数が予測に寄与しているか、見ていくことにしましょう。
"""

X
X.columns
log_model.coef_.shape
log_model.coef_
# 変数名とその係数を格納するDataFrameを作ります。
coeff_df = DataFrame([X.columns, log_model.coef_[0]]).T

coeff_df

"""
係数が正の場合、その変数が増えれば、不倫の可能性は増します。係数が負の場合は、その逆です。
marriage ratingが増えると、不倫の可能性は減少します。 宗教観（religiousness）が高くなると、
同様に不倫の可能性は減少するようです。
ダミー変数は、学生を示す1の変数を取り除いているので、そこが基準となっていることを頭に
入れておく必要がありますが、大きな値になっていれば、その職業に就いている場合に、
不倫率が上がる傾向にあることは見て取れます。実際に、可視化してみるとわかります。

Part 8: 学習とテスト

線形回帰のレクチャーでやったのと同じように、データを学習用とテスト用に分けて、
モデルの性能を確認してみましょう。
"""

X_train, X_test, Y_train, Y_test = train_test_split(X, Y)
log_model2 = LogisticRegression()
log_model2.fit(X_train, Y_train)

# テスト用データを使って、予測してみましょう。
class_predict = log_model2.predict(X_test)

# 精度を計算してみます。
print(metrics.accuracy_score(Y_test, class_predict))

"""

約72％の精度を得ました。これは、すべてのデータを使ったときとだいたい同じです。

Part 9: 結論とその他の話題
ロジスティック回帰を使ってモデルを作り、データをもとに予測する方法を学びました。
数学的な詳細は説明しませんでしたので、興味のある方は是非挑戦してみてください。

機械学習アルゴリズムの精度を上げる方法論が、いろいろと検討されています。 例えば、正則化は、
モデルを出来るだけシンプルにすることで精度を上げようとする方法です。

Wikipedia正則化
https://ja.wikipedia.org/wiki/%E6%AD%A3%E5%89%87%E5%8C%96

regularization techniques（英語）
https://en.wikipedia.org/wiki/Regularization_%28mathematics%29#Regularization_in_statistics_and_machine_learning

その他、すべて英語ですが、ロジスティック回帰に関する資料へのリンクです。
1.) Statsmodelsを使ったロジスティック回帰の解説 yhat!
http://blog.yhat.com/posts/logistic-regression-and-python.html
2.) SciKit learnの公式ドキュメントexamples at the bottom of the page.
http://scikit-learn.org/stable/modules/generated/sklearn.linear_model.LogisticRegression.html
3.) 米国で最近増えているデータ解析を生業とする会社（DataRobot）のページ Logistic Regression
https://www.datarobot.com/blog/classification-with-scikit-learn/
4.) 数学的背景も考慮に入れた解説です aimotion.blogspot
http://aimotion.blogspot.jp/2011/11/machine-learning-with-python-logistic.html
"""
