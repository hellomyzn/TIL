from sklearn import datasets
from sklearn.svm import SVC
from sklearn.cross_validation import train_test_split
from sklearn.metrics import accuracy_score
from sklearn.datasets import make_circles
from matplotlib.colors import ListedColormap
import matplotlib.pyplot as plt
import numpy as np
import matplotlib.pyplot as plt

iris = datasets.load_iris()
x = iris.data[:, [2, 3]]

x = x[0:100]
y = iris.target[0:100]

print(x.shape)
print(y)

x_train, x_test, y_train, y_test = train_test_split(
    x, y, test_size=0.3, random_state=0)

svm = SVC(kernel='linear')
svm.fit(x_train, y_train)

y_predicted = svm.predict(x_test)
print(y_predicted.shape)
print(y_test.shape)
print(accuracy_score(y_test, y_predicted))


plt.scatter(x[:50, 0], x[:50, 1], color='blue', marker='o', label='setosa')
plt.scatter(
    x[50:100, 0], x[50:100, 1], color='red', marker='o', label='versicolor')
plt.legend()
plt.show()
x_min, x_max = x[:, 0].min() - 1, x[:, 0].max() + 1
y_min, y_max = x[:, 1].min() - 1, x[:, 1].max() + 1

x_axis, y_axis = np.meshgrid(np.arange(x_min, x_max, 0.02),
                             np.arange(y_min, y_max, 0.02))
print(x_axis.shape)
print(y_axis.shape)

data_num = x_axis.shape[0] * x_axis.shape[1]
print(data_num)

grid_points = np.concatenate(
    (x_axis.reshape(data_num, 1), y_axis.reshape(data_num, 1)), axis=1)

print(grid_points.shape)

class_labels = svm.predict(grid_points)
print(class_labels.shape)

class_labels = class_labels.reshape(x_axis.shape)
print(class_labels.shape)


markers = ('o', '^')
colors = ('red', 'lightgreen')
cmap = ListedColormap(colors)
labels = ('setosa', 'versicolor')

for i, n in enumerate(np.unique(y)):
    plt.scatter(x=x_train[y_train == n, 0],
                y=x_train[y_train == n, 1],
                c=cmap(i),
                marker=markers[i],
                s=70,
                edgecolors='',
                label=labels[i])

plt.legend(loc='lower right')
plt.xlim(x_axis.min(), x_axis.max())
plt.ylim(y_axis.min(), y_axis.max())

plt.contourf(x_axis, y_axis, class_labels, alpha=0.3, cmap=cmap)
plt.xlabel('Petal Length')
plt.ylabel('Petal Width')
plt.show()

svm = SVC(kernel='rdf')
x, y = make_circles(n_samples=1000, random_state=123, noise=0.1, factor=0.2)

x_train, x_test, y_train, y_test = train_test_split(
    x, y, test_size=0.3, random_state=0)

for i, n in enumerate(np.unique(y)):
    plt.scatter(x=x_train[y_train == n, 0],
                y=x_train[y_train == n, 1],
                c=cmap(i),
                marker=markers[i],
                s=70,
                edgecolors='',
                label=n)


plt.show()


svm = SVC(kernel='linear')
svm.fit(x_train, y_train)
y_predicted = svm.predict(x_test)
print("線形", accuracy_score(y_test, y_predicted))

svm = SVC(kernel='rbf')
svm.fit(x_train, y_train)
y_predicted = svm.predict(x_test)
print("カーネル", accuracy_score(y_test, y_predicted))
