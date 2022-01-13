from typing import List

def cocktail_sort(numbers: List[int]) -> List[int]:
    line = "=" * 80
    print(f"\n\n{line}")
    print(f"cocktail_sort  | [INFO] - Start: {numbers}\n")
    len_numbers = len(numbers)
    swapped = True
    trials_num = 0
    sorts_num = 0
    start = 0
    end = len_numbers - 1

    while swapped:
        swapped = False

        for i in range(start, end):
            trials_num = trials_num + 1
            if numbers[i] > numbers[i + 1]:
                numbers[i], numbers[i + 1] = numbers[i + 1], numbers[i]
                sorts_num = sorts_num + 1
                swapped = True

        if not swapped:
            break
        
        swapped = False
        end = end - 1

        for i in range(end-1, start-1, -1):
            trials_num = trials_num + 1
            if numbers[i] > numbers[i + 1]:
                numbers[i], numbers[i + 1] = numbers[i + 1], numbers[i]
                swapped = True

        start = start + 1
    
    print(f"cocktail_sort  | [INFO] - Result of List: {numbers}")
    print(f"cocktail_sort  | [INFO] - Number of traials: {trials_num}")
    print(f"cocktail_sort  | [INFO] - Number of sorts:  {sorts_num}")
    print(f"{line}\n\n")


    return numbers


if __name__ == "__main__":
    import random
    nums = [random.randint(0, 1000) for i in range(10)]
    cocktail_sort(nums)