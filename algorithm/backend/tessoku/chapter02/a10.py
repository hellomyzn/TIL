N = int(input())
A = list(map(int, input().split()))
D = int(input())
L = [ None ] * D
R = [ None ] * D
for i in range(D):
    L[i], R[i] = map(int, input().split())

left_max = [ None ] * N
left_max[0] = A[0]
for i in range(1, N):
    left_max[i] = max(left_max[i-1], A[i])

right_max = [ None ] * N
right_max[N-1] = A[N-1]
for i in reversed(range(0, N-1)):
    right_max[i] = max(right_max[i+1], A[i])
    
for i in range(D):
    print(max(left_max[(L[i]-1) -1], right_max[(R[i]+1) -1]))