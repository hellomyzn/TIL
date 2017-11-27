import numpy as np
import matplotlib.pyplot as plt


my_list1 = [1, 2, 3, 4]
my_array1 = np.array(my_list1)

my_array1

my_list2 = [11, 22, 33, 44]
my_lists = [my_list1, my_list2]

my_lists
my_array2 = np.array(my_lists)
my_array2
my_array2.dtype

my_zeros_array = np.zeros((5, 5))
my_zeros_array
my_ones_array = np.ones((5, 5))
my_ones_array
my_empty_array = np.empty((5, 5))
my_empty_array
my_eye_array = np.eye(5)
my_eye_array
my_arange_array = np.arange(5)
my_arange_array2 = np.arange(0, 50, 2)
my_arange_array2


# ----------------------------------------------------------------------

# 0の配列を作る
x = np.arange(0, 100, 1)
x *= 0
x

y = np.linspace(0, 100, 101)
y[:] = 0
y

z = np.zeros((10, 10))
z
z_length = z.shape[1]
print(z_length)

a = z[0:7][1:3]
a


points = np.arange(-5, 5, 0.1)
dx, dy = np.meshgrid(points, points)
dx
dy

plt.imshow(dx)
plt.show()
plt.imshow(dy)
plt.show()

z = (np.sin(dx) + np.sin(dy))
z
plt.imshow(z)
plt.show()
plt.imshow(z)
plt.colorbar()
plt.title("Plot for sin(x) + sin(y)")
plt.show()

A = np.array([1, 2, 3, 4])
B = np.array([1000, 2000, 3000, 4000])
condition = np.array([True, True, False, False])
answer = [(a if cond else b) for a, b, cond in zip(A, B, condition)]
answer
answer2 = np.where(condition, A, B)
answer2


arr = np.random.randn(5, 5)
arr
np.where((arr < 0), 0, arr)
arr = np.array([[1, 2, 3], [4, 5, 6], [7, 8, 9]])
arr
arr.sum()
arr.sum(0)
arr.sum(1)
arr.mean()

arr.std()

arr.var()
bool_arr = np.array([True, False, True])
bool_arr.any()
bool_arr.all()


arr = np.arange(5)
np.save('my_array', arr)
arr
arr = np.arange(10)
arr
arr1 = np.load('my_array.npy')
arr1

arr2 = arr
arr2
np.savez('ziparrays.npz', x=arr1, y=arr2)
aaa = np.load('ziparrays.npz')
aaa['x']
