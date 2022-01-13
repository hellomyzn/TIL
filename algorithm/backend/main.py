import copy 

from sort.bubble_sort import bubble_sort
from sort.cocktail_sort import cocktail_sort
from sort.comb_sort import comb_sort

if __name__ == "__main__":
    import random
    nums = [random.randint(0, 1000) for _ in range(100)]

    print(f"[RESULT] - Bubble sort: {bubble_sort(copy.copy(nums))}")
    print(f"[RESULT] - Comb sort: {comb_sort(copy.copy(nums))}")
    print(f"[RESULT] - Cocktail_sort: {cocktail_sort(copy.copy(nums))}")