from typing import List

def cocktail_sort(numbers: List[int]) -> List[int]:
    print(f"[INFO] - List: {numbers}")
    len_numbers = len(numbers)
    swqpped = True
    trials_num = 0
    sorts_num = 0
    start = 0
    end = len_numbers - 1
    print(f"[INFO] - Start_limit: {start}")
    print(f"[INFO] - End_limit: {end}")

    while swqpped:
        trials_num = trials_num + 1
        print(f"[INFO] - # {trials_num}: {numbers}")
        swqpped = False

        for i in range(start, end):
            if numbers[i] > numbers[i + 1]:
                numbers[i], numbers[i + 1] = numbers[i + 1], numbers[i]
                sorts_num = sorts_num + 1
                swqpped = True

        if not swqpped:
            break
        
        swqpped = False
        end = end - 1
        print(f"[INFO] -    End limit is updated: {end}")

        for i in range(end-1, start-1, -1):
            if numbers[i] > numbers[i + 1]:
                numbers[i], numbers[i + 1] = numbers[i + 1], numbers[i]
                swqpped = True

        start = start + 1
        print(f"[INFO] -    Start limit is updated: {start}")
    

    print(f"[RESULT] - Number of traials: {trials_num}")
    print(f"[RESULT] - Number of sorts:  {sorts_num}")
    print(f"[RESULT] - List:  {numbers}")

    return numbers


if __name__ == "__main__":
    import random
    nums = [random.randint(0, 1000) for i in range(10)]
    cocktail_sort(nums)