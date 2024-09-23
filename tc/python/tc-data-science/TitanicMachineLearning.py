import pandas as pd
import numpy as np
import seaborn as sns
import matplotlib.pyplot as plt
from pandas import Series, DataFrame
from collections import Counter


"""
このデータから有用な知見を得るために、明確な目標があったほうが良いでしょう。いくつか、具体的な問いを設定してみます。
1.) タイタニック号の乗客はどのような人達だったのか？
2.) それぞれの乗客はどのデッキにいたか？また、それは客室の種類とどのような関係にあったか？
3.) 乗客は主にどこから来たのか？
4.) 家族連れか、単身者か？

これらの基本的な問いの後に、さらに深くデータ解析を進めます。
5.) 沈没からの生還者には、どのような要因があったのか？
まず最初の質問： タイタニック号の乗客はどのような人達だったのか？
"""


titanic_df = pd.read_csv('~/Downloads/data/train.csv')
"""
passengerId 乗客のID
Survived 生還したか。0は亡くなってしまった人
Pclass 一等客室、二等客室、三頭客室の値
Sibsp 兄弟と乗船したかどうか、　0なら兄弟と乗っていない
Parch 親もしくわは子供がいたかどうか 0ならいない
Fare　チケットの値段
Embarked ３つの港のうちどこの港から乗ったか
Cabin どこにいたか
"""
titanic_df.head()


titanic_df.info()


"""

このデータから有用な知見を得るために、明確な目標があったほうが良いでしょう。いくつか、具体的な問いを設定してみます。
1.) タイタニック号の乗客はどのような人達だったのか？
2.) それぞれの乗客はどのデッキにいたか？また、それは客室の種類とどのような関係にあったか？
3.) 乗客は主にどこから来たのか？
4.) 家族連れか、単身者か？

これらの基本的な問いの後に、さらに深くデータ解析を進めます。
5.) 沈没からの生還者には、どのような要因があったのか？
まず最初の質問： タイタニック号の乗客はどのような人達だったのか？

"""


"""タイタニック号の乗客はどのような人達だったのか？"""

sns.countplot('Sex', data=titanic_df)
plt.show()

sns.countplot('Sex', data=titanic_df, hue="Pclass")
plt.show()
sns.countplot('Pclass', data=titanic_df, hue="Sex")
plt.show()


# 16歳未満を子供とします。
# レクチャー45で学んだ知識を使います。

def male_female_child(passenger):
    age, sex = passenger
    if age < 16:
        return "child"
    else:
        return sex


titanic_df["person"] = titanic_df[["Age", "Sex"]]\
    .apply(male_female_child, axis=1)


titanic_df[0:10]

sns.countplot("Pclass", data=titanic_df, hue="person")
plt.show()
titanic_df['Age'].hist(bins=80, edgecolor="k")
plt.show()
titanic_df['Age'].mean()
titanic_df['person'].value_counts()


# FacetGridを使うと、複数のカーネル密度推定のグラフを1つのプロットに描くことができます。

# 性別で層別化して、グラフを少し横長に設定します。
fig = sns.FacetGrid(titanic_df, hue="Sex", aspect=4)
# mapを使って、性別ごとにkdeplotを描くようにします。
fig.map(sns.kdeplot, 'Age', shade=True)
# xの最大値を長老に合わせます。
oldest = titanic_df['Age'].max()

# x軸の範囲を設定します。
fig.set(xlim=(0, oldest))

# 凡例を付け加えておきましょう。
fig.add_legend()
plt.show()

fig = sns.FacetGrid(titanic_df, hue="person", aspect=4)
fig.map(sns.kdeplot, "Age", shade=True)
oldest = titanic_df["Age"].max()
fig.set(xlim=(0, oldest))
fig.add_legend()
plt.show()

fig = sns.FacetGrid(titanic_df, hue="Pclass", aspect=4)
fig.map(sns.kdeplot, "Age", shade=True)
oldest = titanic_df["Age"].max()
fig.set(xlim=(0, oldest))
fig.add_legend()
plt.show()


"""
性別、年齢、客室の種類など、乗客の全体像がよくわかって来たと思います。
次の質問に移りましょう。 それぞれの乗客はどのデッキにいたか？また、
それは客室の種類とどのような関係にあったか？
"""

titanic_df.head()


deck = titanic_df['Cabin'].dropna()
deck
levels = []
for level in deck:
    levels.append(level[0])
levels

cabin_df = DataFrame(levels)
cabin_df.columns = ['Cabin']
cabin_df

sns.countplot(
    "Cabin",
    data=cabin_df,
    palette="winter_d",
    order=sorted(set(levels))
)
plt.show()
sorted(set(levels))

cabin_df.Cabin

cabin_df = cabin_df[cabin_df.Cabin != "T"]

sns.countplot(
    "Cabin",
    data=cabin_df,
    palette="summer",
    order=sorted(set(cabin_df.Cabin))
)
plt.show()

"""
乗客が居た場所ごとの解析ができました。引き続き、3つ目の質問に応えていきましょう。
3.) 乗客は主に、どこから来たのか？
"""

titanic_df.head()

sns.countplot('Embarked', data=titanic_df, hue="Pclass")
plt.show()

Counter(titanic_df.Embarked)

titanic_df.Embarked.value_counts()


"""

Queenstownからの乗客のほとんどが、3等客室です。これは、当時のこの地域の経済が余り良くなかった事を反映しているのかも知れません。


それでは、4つめの質問です。
4.) 家族連れか？単身者か？
"""


titanic_df.head()

titanic_df["Alone"] = titanic_df.Parch + titanic_df.SibSp
titanic_df["Alone"]

titanic_df["Alone"].loc[titanic_df["Alone"] > 0] = "WithFamily"
titanic_df["Alone"].loc[titanic_df["Alone"] == 0] = "Alone"

titanic_df.head()
sns.countplot("Alone", data=titanic_df, palette="Blues")
plt.show()
titanic_df["Survivor"] = titanic_df.Survived.map({0: "no", 1: "yes"})
titanic_df.head()
sns.countplot("Survivor", data=titanic_df, palette="Set1")
plt.show()

sns.factorplot("Pclass", "Survived", data=titanic_df, order=[1, 2, 3])
plt.show()

sns.factorplot("Pclass",
               "Survived",
               hue="person",
               data=titanic_df,
               order=[1, 2, 3],
               aspect=2)
plt.show()

sns.lmplot("Age", "Survived", data=titanic_df)
plt.show()

sns.lmplot("Age",
           "Survived",
           data=titanic_df,
           hue="Pclass",
           palette="winter",
           hue_order=[1, 2, 3])
plt.show()

generations = [10, 20, 40, 60, 80]
sns.lmplot("Age",
           "Survived",
           data=titanic_df,
           hue="Pclass",
           palette="winter",
           hue_order=[1, 2, 3],
           x_bins=generations)
plt.show()

sns.lmplot("Age",
           "Survived",
           data=titanic_df,
           hue="Sex",
           palette="winter",
           x_bins=generations)
plt.show()
