from typing import List, NewType

IndexNum = NewType('IndexNum', int)

def linear_search(numbers: List[int], value: int) -> IndexNum:
    for i in range(0, len(numbers)):
        if numbers[i] == value:
            print(i)
            return i
    return -1

def bubble_sort(numbers: list[int]) -> list[int]:
    trials_num = 0
    sorts_num = 0
    len_numbers = len(numbers)

    for i in range(len_numbers):
        for j in range(len_numbers -1 -i):
            trials_num += 1
            if numbers[j] > numbers[j+1]:
                sorts_num += 1
                numbers[j+1], numbers[j] = numbers[j], numbers[j+1]
    return numbers

def binary_search(numbers: List[int], value: int) -> IndexNum:
    line = "=" * 80
    print(f"\n\n{line}")
    print(f"{__name__}  | [INFO] - Start: {numbers}\n")
    print(f"Value: {value}")
    left, right = 0, len(numbers) -1

    while left <= right:
        mid = (left + right) // 2

        if numbers[mid] == value:
            print(f"Index: {mid}")
            return mid
        elif numbers[mid] < value:
            left = mid + 1
        else:
            right = mid -1
    print(f"I couldn't find")
    return -1

if __name__ == '__main__':
    
    import random
    nums = [random.randint(0, 1000) for i in range(10)]
    nums = bubble_sort(nums)
    value = nums[random.randint(0, 10)]
    binary_search(nums, value)