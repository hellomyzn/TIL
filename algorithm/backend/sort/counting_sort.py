from typing import List


def counting_sort(numbers: List[int]) -> List[int]:
    line = "=" * 80
    print(f"\n\n{line}")
    print(f"{__name__}  | [INFO] - Start: {numbers}\n")
    trials_num = 0
    sorts_num = 0
    max_num = max(numbers)
    counts = [0] * (max_num + 1)
    result = [0] * len(numbers)

    for num in numbers:
        counts[num] += 1

    for i in range(1, len(counts)):
        counts[i] += counts[i-1]
    
    i = len(numbers) - 1
    while i >= 0:
        index = numbers[i]
        result[counts[index] - 1] = numbers[i]
        counts[index] -= 1
        i -= 1
    print(f"{__name__}  | [INFO] - Result of List: {result}\n")
    return result


if __name__ == "__main__":

    # Jun's code
    import random
    nums = [random.randint(0, 1000) for i in range(10)]
    nums = [5,1,3,2,3,5,1,4]
    counting_sort(nums)