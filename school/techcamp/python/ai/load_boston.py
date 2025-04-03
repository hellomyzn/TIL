from sklearn.datasets import load_boston
from sklearn.cross_validation import train_test_split
from sklearn.linear_model import LinearRegression
from sklearn.metrics import mean_squared_error
import pandas as pd
import matplotlib

# %matplotlib inline

boston = load_boston()
df = pd.DataFrame(boston.data, columns=boston.feature_names)
df.head()
df.describe()
df[df["CHAS"] == 1]
df.plot(kind="scatter", x="CRIM", y="LSTAT")
matplotlib.pyplot.show()
df["NOX"].hist()
y = boston.target
x = boston.data
x_train, x_test, y_train, y_test = train_test_split(x, y, test_size=0.3)
lr = LinearRegression()
lr.fit(x_train, y_train)
y_predict = lr.predict(x_test)

lr_mse = mean_squared_error(y_test, y_predict)

print('LinearRegression MSE: ', lr_mse)
