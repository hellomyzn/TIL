import pandas as pd
import numpy as np
from sklearn.cross_validation import train_test_split
from sklearn.linear_model import LinearRegression
import matplotlib.pyplot as plt

house = pd.read_csv(
    'https://raw.githubusercontent.com/we-b/datasets_for_ai/master/cal_house.csv')

house.head()

house.shape

house.corr()

# median_incomeのデータをXに代入
X = house[['median_income']]
X5 = house.iloc[:, 5]
X6 = pd.DataFrame(house.iloc[:, 6])
X6
X
type(X5)
X5 = pd.DataFrame(X5)

X5
Xn = np.array(house)
print(Xn)
print(Xn.shape)
Xn24 = Xn[:, (2,4)]
pd.DataFrame(Xn24)
X1 = Xn[:, 0:5]
Y1 = Xn[:, 6]
print(X1)
print(Y1)
house.head()
# median_house_valueのデータをyに代入
y = house['median_house_value']

print(X)
print(y)

# トレーニングデータとテストデータの分割の為の関数をインストール
# トレーニングデータとテストデータを70%:30%の割合で分割
X_train, X_test, y_train, y_test = train_test_split(X, y, test_size=0.3)

# トレーニングデータのshapeを確認
print(X_train.shape)
print(y_train.shape)
# テストデータのshapeを確認
print(X_test.shape)
print(y_test.shape)

# 線形回帰モデルの読み込み
# 線形回帰モデルをインスタンス化
lr = LinearRegression()

# トレーニングデータにもとづいて学習
lr.fit(X_train, y_train)

# 係数
print(lr.coef_)
# 切片 (誤差)
print(lr.intercept_)

# 決定係数を出力
print(round(lr.score(X_train, y_train), 2))

# 必要なライブラリのインポート
# データ点をプロット
plt.scatter(X, y, color='blue')
# 線形回帰モデルをプロット
plt.plot(X, lr.predict(X), color='red')

X = house[['housing_median_age', 'total_rooms', 'total_bedrooms',
           'population', 'households', 'median_income']]
print(X.shape)

# トレーニングデータとテストデータを70%:30%の割合で分割
X_train, X_test, y_train, y_test = train_test_split(X, y, test_size=0.3)

# 新しく分割したデータを線形回帰モデルで学習
lr.fit(X_train, y_train)

# 回帰係数
print(lr.coef_)

# 切片 (誤差)
print(lr.intercept_)

# 決定係数
print(round(lr.score(X_train, y_train), 2))
# → 0.64
