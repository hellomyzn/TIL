# while文制御
# pra_8
dx = 1000
diff = 1.0e-10
count = 0
while dx - 1.0 > diff:
    count += 1
    dx = dx ** 0.5
    print(count, dx)
print(count, "回目")

# q8

initial_money = 10000
money = initial_money
interest = 1.015
count = 0
while money < 15000:
    count += 1
    money *= interest
print(count/2, '年')

