
from typing import List


def shell_sort(numbers: List[int]) -> List[int]:
    line = "=" * 80
    print(f"\n\n{line}")
    print(f"{__name__}  | [INFO] - Start: {numbers}\n")
    trials_num = 0
    sorts_num = 0
    len_numbers = len(numbers)
    gap = len_numbers // 2

    while gap > 0:
        for i in range(gap, len_numbers):
            temp = numbers[i]
            j = i
            trials_num += 1
            while j >= gap and numbers[j - gap] > temp:
                sorts_num += 1
                numbers[j] = numbers[j - gap]
                j -= gap
            numbers[j] = temp
        gap //= 2
    print(f"{__name__}  | [INFO] - Result of List: {numbers}\n")
    print(f"{__name__}  | [INFO] - Number of traials: {trials_num}")
    print(f"{__name__}  | [INFO] - Number of sorts:  {sorts_num}")            
    return numbers

if __name__ == "__main__":

    # Jun's code
    import random
    nums = [random.randint(0, 1000) for i in range(10)]
    shell_sort(nums)
