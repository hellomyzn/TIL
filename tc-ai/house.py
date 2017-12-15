import pandas as pd
house = pd.read_csv(
    'https://raw.githubusercontent.com/we-b/datasets_for_ai/master/cal_house.csv')

house.head()

house.shape

house.corr()

# median_incomeのデータをXに代入
X = house[['median_income']]
# median_house_valueのデータをyに代入
y = house['median_house_value']

print(X)
print(y)

# トレーニングデータとテストデータの分割の為の関数をインストール
from sklearn.cross_validation import train_test_split
# トレーニングデータとテストデータを70%:30%の割合で分割
X_train, X_test, y_train, y_test = train_test_split(X, y, test_size=0.3)

# トレーニングデータのshapeを確認
print(X_train.shape)
print(y_train.shape)
# テストデータのshapeを確認
print(X_test.shape)
print(y_test.shape)

# 線形回帰モデルの読み込み
from sklearn.linear_model import LinearRegression
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
import matplotlib.pyplot as plt
%matplotlib inline
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
