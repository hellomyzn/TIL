from typing import List

def binary_search(value: int, numbers: List[int]) -> int:
    l, r  = 0, len(numbers) -1
    while l <= r:
        mid = (l + r) // 2
        if numbers[mid] == value:
            return mid
        elif numbers[mid] < value:
            l = mid + 1
        else:
            r = mid -1
    return -1

N, X = map(int, input().split())
A = list(map(int, input().split()))

Answer = binary_search(X, A)
print(Answer + 1)