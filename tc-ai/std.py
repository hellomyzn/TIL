from sklearn import datasets
from sklearn.cross_validation import train_test_split
from sklearn.preprocessing import StandardScaler
from sklearn.linear_model import LogisticRegression
from matplotlib.colors import ListedColormap
import matplotlib.pyplot as plt
import numpy as np


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

x_concat_std = np.concatenate((x_train_std, x_test_std), axis=0)
x_min, x_max = x_concat_std[:, 0].min() - 1, x_concat_std[:, 0].max() + 1
y_min, y_max = x_concat_std[:, 1].min() - 1, x_concat_std[:, 1].max() + 1
print(x_min, x_max)
print(y_min, y_max)
x_axis, y_axis = np.meshgrid(np.arange(x_min, x_max, 0.02),
                             np.arange(y_min, y_max, 0.02))

print(x_axis.shape)
print(y_axis.shape)

data_num = x_axis.shape[0] * x_axis.shape[1]
print(data_num)

grid_points = np.concatenate(
    (x_axis.reshape(data_num, 1), y_axis.reshape(data_num, 1)), axis=1)

class_labels = lr.predict(grid_points)
class_labels = class_labels.reshape(x_axis.shape)

plt.xlim(x_axis.min(), x_axis.max())
plt.ylim(y_axis.min(), x_axis.max())

plt.contourf(x_axis, y_axis, class_labels, alpha=0.3, cmap=cmap)

for i, n in enumerate(np.unique(y)):
    plt.scatter(x=x_train_std[y_train == n, 0],
                y=x_train_std[y_train == n, 1],
                c=cmap(i),
                marker=markers[i],
                s=70,
                edgecolors='',
                label=n)

plt.scatter(x=x_test_std[:, 0],
            y=x_test_std[:, 1],
            c='k',
            marker='v',
            label='test data')

plt.xlabel('Petal Length')
plt.ylabel('Patel Width')

plt.legend(loc='lower right')

plt.show()
