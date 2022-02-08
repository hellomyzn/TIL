"""
[1,3,3,5,5,7,7,7,10,12,12,15] => [1,2,5,7,10,12,15]
"""

# l = [1,3,3,5,5,7,7,7,10,12,12,15]

# print(set(l))
# print(list(dict.fromkeys(l)))
# print([n for i, n in enumerate(l) if n in l[:i]])

from typing import List


def remove_duplicate_v1(numbers: List[int]) -> None:
    temp = []
    for num in numbers:
        if num not in temp:
            temp.append(num)
    numbers[:] = temp

def remove_duplicate_v2(numbers: List[int]) -> None:
    temp = [numbers[0]]
    i, len_num = 0, len(numbers) -1
    while i < len_num:
        if numbers[i] != numbers[i+1]:
            temp.append(numbers[i+1])
        i += 1
    numbers[:] = temp

def remove_duplicate_v3(numbers: List[int]) -> None:
    i = 0
    while i < len(numbers) -1:
        if numbers[i] == numbers[i+1]:
            numbers.remove(numbers[i])
            i -= 1
        i += 1

def remove_duplicate_v4(numbers: List[int]) -> None:
    i = len(numbers) -1
    while i > 0:
        if numbers[i] == numbers[i-1]:
            numbers.pop(i)
        i -= 1


if __name__ == '__main__':

    l = [1,3,3,5,5,7,7,7,10,12,12,15,7]
    remove_duplicate_v1(l)
    print(l)
    l = [1,3,3,5,5,7,7,7,10,12,12,15,7]
    remove_duplicate_v2(l)
    print(l)
    l = [1,3,3,5,5,7,7,7,10,12,12,15,7]
    remove_duplicate_v3(l)
    print(l)
    l = [1,3,3,5,5,7,7,7,10,12,12,15,7]
    remove_duplicate_v4(l)
    print(l)