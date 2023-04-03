# for文制御
# pra7_1
dx = 1000
for cnt in range(50):
    dx = dx ** 0.5
    print(cnt, ':', dx)


# pra7_2
arys = [ [12,2,2,3], [23], [34,2,17], [45,3,3,5] ]
for row in range(len(arys)):
    for col in range(len(arys[row])):
        arys[row][col] *= 2
        print(arys[row][col], ', ', end="")
    print()


# pra7_3
fruits = ['apple', 'kiwi', 'plum']
for f in fruits[:]:
    if len(f) < 5:
        fruits.insert(0, f)
        fruits.pop()
print(fruits, end=" ")
print()


# q7
initial_money = 10000
money = initial_money
interest = 1.015
years = 10
for _ in range(years * 2):
    money *= interest 
print(money)
