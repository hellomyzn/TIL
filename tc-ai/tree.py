from sklearn import datasets
from sklearn.cross_validation import train_test_split
from sklearn.tree import DecisionTreeClassifier
from sklearn.ensemble import RandomForestClassifier
from matplotlib.colors import ListedColormap
import matplotlib.pylab as plt
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

print(x_axis.shape)
print(y_axis.shape)

data_num = x_axis.shape[0] * x_axis.shape[1]
print(data_num)

grid_points = np.concatenate(
    (x_axis.reshape(data_num, 1), y_axis.reshape(data_num, 1)), axis=1)
print(grid_points.shape)

tree = DecisionTreeClassifier(criterion='entropy', max_depth=3, random_state=0)
forest = RandomForestClassifier(
    criterion="entropy", n_estimators=10, random_state=1)
tree.fit(x_train, y_train)
forest.fit(x_train, y_train)

# pred_label = tree.predict(grid_points)
pred_label = forest.predict(grid_points)

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

plt.scatter(x=x_test[:, 0],
            y=x_test[:, 1],
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
