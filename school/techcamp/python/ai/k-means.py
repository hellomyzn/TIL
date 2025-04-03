from sklearn.datasets import make_blobs
from sklearn.cluster import KMeans
import matplotlib.pyplot as plt
x, y = make_blobs(n_samples=300,
                  n_features=2,
                  centers=3,
                  random_state=0)

print(x)
print(y)
plt.scatter(x[:, 0],
            x[:, 1],
            c="blue",
            marker="o",
            s=50)
plt.show()


km = KMeans(n_clusters=5)
km.fit(x)
km_predict = km.predict(x)
print(km_predict)
plt.scatter(x=x[km_predict == 0, 0],
            y=x[km_predict == 0, 1],
            s=50,
            c='green',
            label='cluster1')
plt.scatter(x=x[km_predict == 1, 0],
            y=x[km_predict == 1, 1],
            s=50,
            c='purple',
            label='cluster2')
plt.scatter(x=x[km_predict == 2, 0],
            y=x[km_predict == 2, 1],
            s=50,
            c='red',
            label='cluster3')
plt.scatter(x=x[km_predict == 3, 0],
            y=x[km_predict == 3, 1],
            s=50,
            c='blue',
            label='cluster4')
plt.scatter(x=x[km_predict == 4, 0],
            y=x[km_predict == 4, 1],
            s=50,
            c='orange',
            label='cluster5')
plt.scatter(x=km.cluster_centers_[:, 0],
            y=km.cluster_centers_[:, 1],
            s=250,
            marker='*',
            c='yellow',
            label='centroid')
plt.show()

print('sum of Distance:', km.inertia_)


distances = []
for i in range(1, 11):
    km = KMeans(n_clusters=i)
    km.fit(x)
    distances.append(km.inertia_)

plt.plot(range(1, 11), distances, marker='.')
plt.xlabel('Number of Clusters')
plt.ylabel('Sum of Distance')
plt.show()
print(distances[4])


km = KMeans(n_clusters=3)
km.fit(x)
km_predict = km.predict(x)
print(km.predict)
plt.scatter(x=x[km_predict == 0, 0],
            y=x[km_predict == 0, 1],
            s=50,
            c='green',
            label='cluster1')

plt.scatter(x=x[km_predict == 1, 0],
            y=x[km_predict == 1, 1],
            s=50,
            c='purple',
            label='cluster2')

plt.scatter(x=x[km_predict == 2, 0],
            y=x[km_predict == 2, 1],
            s=50,
            c='red',
            label='cluster3')

# クラスターの重心は★マークを表示
plt.scatter(x=km.cluster_centers_[:, 0],
            y=km.cluster_centers_[:, 1],
            s=250,
            marker='*',
            c='yellow',
            label='centroid')
plt.show()
