
from typing import List

"""
Output elements of array turn
"""


"""
Insert sort
"""
# Old code
# def insertionSort(A=None, N=0):

#     for n, i in enumerate(range(N)):
#         v = A[i]
#         j = i - 1
#         while (j >= 0 and A[j] > v):
#             A[j + 1] = A[j]
#             j -= 1
#         A[j + 1] = v
#         print(n, "回目\n",A, "\n\n")
#     print("完成\n",A)
#     return A

# Jun's code
def insertion_sort(numbers: List[int]) -> List[int]:
    line = "=" * 80
    print(f"\n\n{line}")
    print(f"{__name__}  | [INFO] - Start: {numbers}\n")
    trials_num = 0
    sorts_num = 0
    len_numbers = len(numbers)

    for i in range(1, len_numbers):
        temp = numbers[i]
        j = i -1
        trials_num += 1

        while j >= 0 and numbers[j] > temp:
            sorts_num += 1
            numbers[j+1] = numbers[j]
            j -= 1
        
        numbers[j + 1] = temp

    print(f"{__name__}  | [INFO] - Result of List: {numbers}\n")
    print(f"{__name__}  | [INFO] - Number of traials: {trials_num}")
    print(f"{__name__}  | [INFO] - Number of sorts:  {sorts_num}")    
    print(f"{line}\n\n")

    return numbers



if __name__ == "__main__":
    # Old code
    # # 数列の長さ
    # N = 0
    # # 数列の配列
    # A = []
    # N = int(input("\n数列の長さを入力してください\n"))
    # for i in range(N):
    #     A.append(int(input(i, "個目の要素を入力してください")))
    #     print("\n")
    # A = insertionSort(A, N)
    # print(A)

    # Jun's code
    import random
    nums = [random.randint(0, 1000) for i in range(10)]
    insertion_sort(nums)
