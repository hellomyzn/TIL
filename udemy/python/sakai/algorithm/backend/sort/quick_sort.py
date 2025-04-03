from typing import List

def partition(numbers: List[int], low: int, high: int) -> int:
    i = low -1
    pivot = numbers[high]
    for j in range(low, high):
        if numbers[j] <= pivot:
            i += 1
            numbers[i], numbers[j] = numbers[j], numbers[i]

    numbers[i + 1], numbers[high] = numbers[high], numbers[i + 1]
    return i + 1

def quick_sort(numbers: List[int]) -> List[int]:
    line = "=" * 80
    print(f"\n\n{line}")
    print(f"{__name__}  | [INFO] - Start: {numbers}\n")

    def _quick_sort(numbers: List[int], low: int, high: int) -> None:
        if low < high:
            partition_index = partition(numbers, low, high)
            _quick_sort(numbers, low, partition_index -1)
            _quick_sort(numbers, partition_index +1, high)

    _quick_sort(numbers, 0, len(numbers) -1)
    print(f"{__name__}  | [INFO] - Result of List: {numbers}\n")
    return numbers

if __name__ == '__main__':
    
    import random
    nums = [random.randint(0, 1000) for i in range(10)]
    quick_sort(nums)