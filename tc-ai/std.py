from sklearn import datasets
from sklearn.cross_validation import train_test_split
from sklearn.preprocessing import StandardScaler
from sklearn.linear_model import LogisticRegression
from matplotlib.colors import ListedColormap
import matplotlib.pyplot as plt
import numpy as np
#%matplotlib inline

iris = datasets.load_iris()
x = iris.data[:, [2, 3]]
y = iris.target

x_train, x_test, y_train, y_test = train_test_split(
    x, y, test_size=0.3, random_state=0)

sc = StandardScaler()
sc.fit(x_train)

x_train_std = sc.transform(x_train)
x_test_std = sc.transform(x_test)

print(x_train.std())
print(x_train_std.std())
plt.scatter(x_train[:, 0], x_train[:, 1], label="origin data")
plt.scatter(x_train_std[:, 0], x_train_std[:, 1], label="standardize data")

plt.xlim([-2, 7])
plt.ylim([-2, 3])
plt.grid()
plt.legend(loc="lower right")
plt.show()

lr = LogisticRegression(C=1000.0, random_state=0)
lr.fit(x_train_std, y_train)


markers = ('o', '^', 'x')
colors = ('red', 'lightgreen', 'cyan')
cmap = ListedColormap(colors)


for i, n in enumerate(np.unique(y)):
    plt.scatter(x=x_train_std[y_train == n, 0],
                y=x_train_std[y_train == n, 1],
                c=cmap(i),
                marker=markers[i],
                s=70,
                edgecolors='',
                label=n)

plt.scatter(x_test_std[:, 0],
            x_test_std[:, 1],
            c='k',
            marker='v',
            label='test data')

plt.xlabel('Petal Length')
plt.ylabel('Petal Width')

plt.legend(loc='lower right')

plt.show()
