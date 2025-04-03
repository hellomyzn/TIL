from typing import List

def counting_sort(numbers: List[int], place: int) -> List[int]:
    print(f"# place:   {place}: ")
    print(f"# numbers: {numbers}: ")
    counts = [0] * 10
    result = [0] * len(numbers)

    """
        num = 1234, place=1
        >>> (1234 / 1) % 10 = 4

        num = 1234, place=10
        >>> (1234 / 10) % 10 = 3(3.4)

        num = 1234, place=100
        >>> (1234 / 100) % 10 = 2(2.34)
    """
    for num in numbers:
        index = int(num / place) % 10
        counts[index] += 1
    print(f"# counts:  {counts}")

    for i in range(1, 10):
        counts[i] += counts[i-1]
    print(f"# counts:  {counts}")

    """
    # place:   1: 
    # numbers: [299, 101, 298, 355, 602, 588, 792, 520, 970, 483]: 
    # counts:  [2, 1, 2, 1, 0, 1, 0, 0, 2, 1]
    # counts:  [2, 3, 5, 6, 6, 7, 7, 7, 9, 10]
    # result:  [520, 970, 101, 602, 792, 483, 355, 298, 588, 299] 

    # place:   10: 
    # numbers: [520, 970, 101, 602, 792, 483, 355, 298, 588, 299]: 
    # counts:  [2, 0, 1, 0, 0, 1, 0, 1, 2, 3]
    # counts:  [2, 2, 3, 3, 3, 4, 4, 5, 7, 10]
    # result:  [101, 602, 520, 355, 970, 483, 588, 792, 298, 299] 

    # place:   100: 
    # numbers: [101, 602, 520, 355, 970, 483, 588, 792, 298, 299]: 
    # counts:  [0, 1, 2, 1, 1, 2, 1, 1, 0, 1]
    # counts:  [0, 1, 3, 4, 5, 7, 8, 9, 9, 10]
    # result:  [101, 298, 299, 355, 483, 520, 588, 602, 792, 970] 
    """
    i = len(numbers) - 1
    while i >= 0:
        index = int(numbers[i] / place) % 10
        result[counts[index] - 1] = numbers[i]
        counts[index] -= 1
        i -= 1
    print(f"# result:  {result} \n")

    return result


def radix_sort(numbers: List[int]) -> List[int]:
    line = "=" * 80
    print(f"\n\n{line}")
    print(f"{__name__}  | [INFO] - Start: {numbers}\n")
    max_num = max(numbers)
    place = 1

    while max_num > place:
        numbers = counting_sort(numbers, place)
        place *= 10

    print(f"{__name__}  | [INFO] - Result of List: {numbers}\n")
    return numbers


if __name__ == "__main__":

    # Jun's code
    import random
    nums = [random.randint(0, 1000) for i in range(10)]
    radix_sort(nums)