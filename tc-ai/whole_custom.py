from sklearn.cluster import KMeans
from sklearn.preprocessing import MaxAbsScaler
import pandas as pd
import numpy as np
import matplotlib.pyplot as plt

dataset = pd.read_csv("https://archive.ics.uci.edu/ml/machine-learning-databases/00292/Wholesale%20customers%20data.csv")
dataset.head()

del(dataset['Channel'])
del(dataset['Region'])
dataset.head()

print('<データセットの平均値>\n', dataset.mean())
print('<データセットの標準偏差>\n', dataset.std())
mas = MaxAbsScaler()
x_std = mas.fit_transform(dataset)


print('<データセットの平均値>\n',  x_std.mean())
print('<データセットの標準偏差>\n', x_std.std())

distances = []
for i in range(1, 10):
    km = KMeans(n_clusters=i,
                random_state=0)
    km.fit(x_std)
    distances.append(km.inertia_)
plt.plot(range(1, 10), distances, marker='.')
plt.xlabel('Number of Clusters')
plt.ylabel('Sum of Distance')
plt.title('Elbow method')
plt.show()

km = KMeans(n_clusters=5, random_state=0)
y = km.fit_predict(x_std)
print(y)

centroids = km.cluster_centers_
print(centroids)
print(centroids.shape)

pd_centroids = pd.DataFrame(centroids, columns=dataset.columns)
pd_centroids.plot.bar()
plt.show()
