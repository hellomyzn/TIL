num = int(input("整列の長さを入力してください : "))



line = "-------------------------------------------------"


array = []
for n in range(num):
    print(line)
    m = input(str(n + 1) + "個目の整数を入力してください\n\n")
    array.append(int(m))
    

for n in range(num):
    m = n + 1
    i = array[n - 1]
    j = array[n]

    while (m < 0 and i > j):
        print("hoge")
        print(array[n])
        print(type(n))
        array[n] = i
        array[m] = j
        m -= 1
    print(n, "回目のReplace", array)

