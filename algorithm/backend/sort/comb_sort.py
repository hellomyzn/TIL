from typing import List

def comb_sort(numbers: List[int]) -> List[int]:
    print(f"[INFO] - List: {numbers}")
    len_numbers = len(numbers)
    trials_num = 0
    sorts_num = 0
    gap = len_numbers
    print(f"[INFO] - Gap: {gap}")
    swapped = True

    while gap != 1 or swapped:
        trials_num = trials_num + 1
        print(f"[INFO] - # {trials_num}: {numbers}")

        gap = int(gap / 1.3)
        print(f"[INFO] -    Gap is updated: {gap}")
        
        if gap < 1:
            gap = 1
        
        swapped = False

        for i in range(0, len_numbers - gap):
            if numbers[i] > numbers[i + gap]:
                 numbers[i], numbers[i + gap] = numbers[i + gap], numbers[i]
                 sorts_num = sorts_num + 1
                 swapped = True

    print(f"[RESULT] - Number of traials: {trials_num}")
    print(f"[RESULT] - Number of sorts:  {sorts_num}")
    print(f"[RESULT] - List:  {numbers}")

    return numbers

if __name__ == "__main__":
    import random
    nums = [random.randint(0, 1000) for i in range(10)]
    print(f"[RESULT] - Comb_sort: {comb_sort(nums)}")