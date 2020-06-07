
"""
1. Maximum subarray sum
Input: [1, -2, 3, 6, -1, 2, 4, -5, 2]
Output: 14 (3, 6, -1, 2, 4)

2. Maximum circular subarray sum
Input: [1, -2, 3, 6, -1, 2, 4, -5, 2]
Output: 15 (2, 1, -2, 3, 6, -1, 2, 4)
"""
from typing import List



def get_max_sequence_sum(numbers: List[int]) -> int:
    result_sequence, sum_sequence = 0, 0
    for num in numbers:
        # Input: [1, -2, 3, 6, -1, 2, 4, -5, 2]
        # temp_sum_sequence = sum_sequence + num
        # if num < temp_sum_sequence:
        #     sum_sequence = temp_sum_sequence
        # else:
        #     sum_sequence = num

        sum_sequence = max(num, sum_sequence + num)

        # if result_sequence < sum_sequence:
        #     result_sequence = sum_sequence

        result_sequence = max(result_sequence, sum_sequence)

    return result_sequence


if __name__ == '__main__':
    print(get_max_sequence_sum([1, -2, 3, 6, -1, 2, 4, -5, 2]))
