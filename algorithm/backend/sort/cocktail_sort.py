from typing import List

def cocktail_sort(numbers: List[int]) -> List[int]:
    print(f"[INFO] - List: {numbers}")
    len_numbers = len(numbers)
    swapped = True
    trials_num = 0
    sorts_num = 0
    start = 0
    end = len_numbers - 1
    print(f"[INFO] - Start_limit: {start}")
    print(f"[INFO] - End_limit: {end}")

    while swapped:
        trials_num = trials_num + 1
        print(f"[INFO] - # {trials_num}: {numbers}")
        swapped = False

        for i in range(start, end):
            if numbers[i] > numbers[i + 1]:
                numbers[i], numbers[i + 1] = numbers[i + 1], numbers[i]
                sorts_num = sorts_num + 1
                swapped = True

        if not swapped:
            break
        
        swapped = False
        end = end - 1
        print(f"[INFO] -    End limit is updated: {end}")

        for i in range(end-1, start-1, -1):
            if numbers[i] > numbers[i + 1]:
                numbers[i], numbers[i + 1] = numbers[i + 1], numbers[i]
                swapped = True

        start = start + 1
        print(f"[INFO] -    Start limit is updated: {start}")
    

    print(f"[RESULT] - Number of traials: {trials_num}")
    print(f"[RESULT] - Number of sorts:  {sorts_num}")

    return numbers


if __name__ == "__main__":
    import random
    nums = [random.randint(0, 1000) for i in range(10)]
    print(f"[RESULT] - Cocktail_sort: {cocktail_sort(nums)}")