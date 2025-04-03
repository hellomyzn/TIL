# from itertools import permutations
# l = [1,2,3]
# for r in permutations(l):
#     print(r)

from typing import List, Iterator

def all_perms_v1(elements: List[int]) -> List[List[int]]:
    result = []
    
    if len(elements) <= 1:
        return [elements]

    for perm in all_perms_v1(elements[1:]):
        for i in range(len(elements)):
            result.append((perm[:i] + elements[0:1] + perm[i:]))

    return result


def all_perms_v2(elements: List[int]) -> List[List[int]]:
    if len(elements) <= 1:
        yield elements
    else:
        for perm in all_perms_v2(elements[1:]):
            for i in range(len(elements)):
                yield perm[:i] + elements[0:1] + perm[i:]


if __name__ == '__main__':
    l = [1,2,3,4]
    for p in all_perms_v1(l):
        print(p)
    print("########### start v2")
    l = [1,2,3,4]
    for p in all_perms_v2(l):
        print(p)
