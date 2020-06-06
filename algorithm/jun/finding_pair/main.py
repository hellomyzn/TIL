"""
1. Input: [11, 2, 5, 9, 10, 3], 12 => Output: (2, 10) or None
2. Input: [11, 2, 5, 9, 10, 3]     => Output: (11, 9) or None ex) 11 + 9 = 2 + 5 + 10 + 3
"""

from typing import List, Tuple, Optional


def get_pair(numbers: List[int], target: int) -> Optional[Tuple[int, int]]:
    cache = set()
    for num in numbers:
        cache.add(num)
        val = target - num
        if val in cache:
            return val, num


if __name__ == '__main__':
    l = [11, 2, 5, 9, 10, 3]
    t = 12
    print(get_pair(l,t))

