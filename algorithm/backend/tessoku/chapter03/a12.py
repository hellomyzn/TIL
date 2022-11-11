# if answer is less than x, return True
def check(x, N, K, A):
    sum = 0
    for i in range(N):
        sum += x // A[i]
    
    if K <= sum:
        return True
    return False

N, K = map(int, input().split())
A = list(map(int, input().split()))

L = 1
R = 10 ** 9

while L < R:
    M = (L + R) // 2
    Answer = check(M, N, K, A)
    if Answer == True:
        R = M
    elif Answer == False:
        L = M + 1

print(L)