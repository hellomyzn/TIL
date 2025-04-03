from typing import List

def check(m: int, N: int, K: int, numbers: List) -> bool:
    sum = 0
    for i in range(N):
        sum += m // numbers[i]
    
    if K <= sum:
        return True
    return False


N, K = map(int, input().split())
A = list(map(int, input().split()))

l, r = 1, 10 ** 9

while l < r:
    m = (l + r) // 2
    Answer = check(m, N, K, A)
    if Answer == True:
        r = m
    elif Answer == False:
        l = m + 1
print(l)
