from typing import List

def comb_sort(numbers: List[int]) -> List[int]:
    line = "=" * 80
    print(f"\n\n{line}")
    print(f"{__name__}  | [INFO] - Start: {numbers}\n")
    len_numbers = len(numbers)
    trials_num = 0
    sorts_num = 0
    gap = len_numbers
    swapped = True

    while gap != 1 or swapped:
        gap = int(gap / 1.3)
        
        if gap < 1:
            gap = 1
        
        swapped = False

        for i in range(0, len_numbers - gap):
            trials_num += 1
            if numbers[i] > numbers[i + gap]:
                 numbers[i], numbers[i + gap] = numbers[i + gap], numbers[i]
                 sorts_num += 1
                 swapped = True

    print(f"{__name__}  | [INFO] - Result of List: {numbers}\n")
    print(f"{__name__}  | [INFO] - Number of traials: {trials_num}")
    print(f"{__name__}  | [INFO] - Number of sorts:  {sorts_num}")
    print(f"{line}\n\n")

    return numbers

if __name__ == "__main__":
    import random
    nums = [random.randint(0, 1000) for i in range(10)]
    comb_sort(nums)