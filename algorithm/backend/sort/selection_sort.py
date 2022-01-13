from typing import List

# Old code
# def selectionSort(A=None, N=0):
#     i, j, t, sw, = 0, 0, 0, 0
#     for n,i in enumerate(range(N)):
#         minj = i

#         # 最小値を検索
#         for j in range(i, N):
#             if(A[j] < A[minj]):
#                 minj = j

#         # 最小値を入れ替える
#         A[i], A[minj] = A[minj], A[i]

#         if(i != minj):
#             sw += 1
#         print(n, "回目 \n", A, "\n\n")

#     print("完成\n",A)
#     return sw

# From Jun's Udemy
def selection_sort(numbers: List[int]) -> List[int]:
    line = "=" * 80
    print(f"\n\n{line}")
    print(f"selection_sort  | [INFO] - Start: {numbers}")
    sorts_num = 0
    trials_num = 0
    len_numbers = len(numbers)

    for i in range(len_numbers):
        min_idx = i

        for j in range(i+1, len_numbers):
            trials_num = trials_num + 1

            if numbers[min_idx] > numbers[j]:
                min_idx = j

        numbers[i], numbers[min_idx] = numbers[min_idx], numbers[i]
        sorts_num = sorts_num + 1
    
    print(f"selection_sort  | [INFO] - Result of List: {numbers}\n")
    print(f"selection_sort  | [INFO] - Number of traials: {trials_num}")
    print(f"selection_sort  | [INFO] - Number of sorts:  {sorts_num}")    
    print(f"{line}\n\n")

    return numbers


if __name__ == "__main__":

    # Old code
    # # 任意の要素の配列を入力
    # A = []
    # N = int(input())
    # for i in range(N):
    #     A.append(int(input()))
    # sw = selectionSort(A, N)
    # print(A)
    # print(sw)
    import random
    nums = [random.randint(0, 1000) for i in range(10)]
    selection_sort(nums)
