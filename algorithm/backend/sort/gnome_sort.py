from typing import List

def gnome_sort(numbers: List[int]) -> List[int]:
    line = "=" * 80
    print(f"\n\n{line}")
    print(f"{__name__}  | [INFO] - Start: {numbers}\n")
    len_numbers = len(numbers)
    trials_num = 0
    sorts_num = 0
    index = 0
    while index < len_numbers:
        if index == 0:
            index += 1
        
        trials_num += 1
        if numbers[index] >= numbers[index-1]:
            index += 1
        else:
            numbers[index], numbers[index-1] = numbers[index-1], numbers[index]
            sorts_num += 1
            index -= 1

    print(f"{__name__}  | [INFO] - Result of List: {numbers}\n")
    print(f"{__name__}  | [INFO] - Number of traials: {trials_num}")
    print(f"{__name__}  | [INFO] - Number of sorts:  {sorts_num}")
    print(f"{line}\n\n")

    return numbers

if __name__ == "__main__":
    import random
    nums = [random.randint(0, 1000) for i in range(10)]
    gnome_sort(nums)
