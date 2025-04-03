# input
N, S = map(int, input().split())
A = list(map(int, input().split()))

# 動的計画法 (i=0)
dp = [ [False] * (S+1) for _ in range(N + 1) ]
dp[0][0] = True
 
# 動的計画法 (i<= 1)
for i in range(1, N+1):
    for j in range(S+1):
        #check A
        if j < A[i-1]:
            if dp[i-1][j] == True:
                dp[i][j] = True
        #check B
        else:
            if (dp[i-1][j] == True or dp[i-1][j - A[i-1]]) == True:
                dp[i][j] = True

# output
if dp[N][S] == True:
    print('Yes')
else:
    print('No')
