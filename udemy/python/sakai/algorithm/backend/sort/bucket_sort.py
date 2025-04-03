from typing import List

def insertion_sort(numbers: List[int], trials_num, sorts_num):
    len_numbers = len(numbers)

    for i in range(1, len_numbers):
        temp = numbers[i]
        j = i -1
        trials_num += 1

        while j >= 0 and numbers[j] > temp:
            sorts_num += 1
            numbers[j+1] = numbers[j]
            j -= 1
        
        numbers[j + 1] = temp

    return trials_num, sorts_num

def bucket_sort(numbers: List[int]) -> List[int]:
    line = "=" * 80
    print(f"\n\n{line}")
    print(f"{__name__}  | [INFO] - Start: {numbers}\n")
    trials_num = 0
    sorts_num = 0
    max_num = max(numbers)
    len_numbers = len(numbers)
    size = max_num // len_numbers

    buckets = [[] for _ in range(size)]
    for num in numbers:
        i = num // size
        trials_num += 1
        if i != size:
            sorts_num += 1
            buckets[i].append(num)
        else:
            sorts_num += 1
            buckets[size-1].append(num)

    for i in range(size):
        trials_num, sorts_num = insertion_sort(buckets[i], trials_num, sorts_num)
    
    result = []
    for i in range(size):
        trials_num += 1
        sorts_num += 1
        result += buckets[i]

    print(f"{__name__}  | [INFO] - Result of List: {result}\n")
    print(f"{__name__}  | [INFO] - Number of traials: {trials_num}")
    print(f"{__name__}  | [INFO] - Number of sorts:  {sorts_num}")    
    print(f"{line}\n\n")
    return result

if __name__ == "__main__":
    import random
    nums = [random.randint(0, 1000) for i in range(10)]
    # nums = [1,5,28,25,100,52,27,91,22,99]
    bucket_sort(nums)
