N = int(input())

for i in [9,8,7,6,5,4,3,2,1,0]:
    div = 2 ** i
    print((N // div) % 2, end='')
print("")