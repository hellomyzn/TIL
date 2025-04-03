import numpy as np

x = np.array([0, 1])
w = np.array([0.5, 0.5])
b = -0.7


# 重みと入力の掛け算
print(w * x)

# 総和
print(np.sum(x*w))

# 総和 + バイアス
print(np.sum(w*x) + b)


def AND(x1, x2):
    x = np.array([x1, x2])
    w = np.array([0.5, 0.5])
    b = -0.7

    tmp = np.sum(w*x) + b
    if tmp <= 0:
        return 0
    else:
        return 1
