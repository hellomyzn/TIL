from sklearn import datasets
from sklearn.cross_validation import train_test_split
from sklearn.neighbors import KNeighborsClassifier
from matplotlib.colors import ListedColormap
import matplotlib.pyplot as plt
import numpy as np


iris = datasets.load_iris()
x = iris.data[:, [2, 3]]
y = iris.target
x_train, x_test, y_train, y_test = train_test_split(
    x, y, test_size=0.3, random_state=0)

x_min, x_max = x[:, 0].min() - 1, x[:, 0].max() + 1
y_min, y_max = x[:, 1].min() - 1, x[:, 1].max() + 1

x_axis, y_axis = np.meshgrid(np.arange(x_min, x_max, 0.02),
                             np.arange(y_min, y_max, 0.02))
x_axis.shape

a = np.meshgrid(np.arange(0, 5, 1), np.arange(10, 15, 1))
a[0].shape
a[1].shape
a[0]
a[1]

c = np.concatenate((a[0].reshape(25, 1), a[1].reshape(25, 1)), axis=1)
c.shape
c
print(x_axis.shape)
print(y_axis.shape)

data_num = x_axis.shape[0] * x_axis.shape[1]
print(data_num)

grid_points = np.concatenate(
    (x_axis.reshape(data_num, 1), y_axis.reshape(data_num, 1)), axis=1)

print(grid_points.shape)

knn = KNeighborsClassifier(n_neighbors=5)
knn.fit(x_train, y_train)

pred_label = knn.predict(grid_points)
pred_label = pred_label.reshape(x_axis.shape)
print(pred_label.shape)


markers = ('o', '^', 'x')
colors = ('red', 'lightgreen', 'cyan')
cmap = ListedColormap(colors)


for i, n in enumerate(np.unique(y)):
    plt.scatter(x=x_train[y_train == n, 0],
                y=x_train[y_train == n, 1],
                c=cmap(i),
                marker=markers[i],
                s=70,
                edgecolors='',
                label=n)

plt.scatter(x_test[:, 0],
            x_test[:, 1],
            c='k',
            marker='v',
            label='test data')
plt.xlim(x_axis.min(), x_axis.max())
plt.ylim(y_axis.min(), y_axis.max())

plt.contourf(x_axis, y_axis, pred_label, alpha=0.3, cmap=cmap)
plt.legend(loc='lower right')

plt.xlabel('Petal Length')
plt.ylabel('Petal Width')
plt.show()
