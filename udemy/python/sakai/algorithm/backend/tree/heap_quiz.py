from collections import Counter
import heapq
from typing import List


def top_n_with_heap(words: List[str], n: int) -> List[str]:
    # d = {}
    # for word in words:
    #     d[word] = d.get(word, 0) + 1
    # print(d)

    # Count the words
    counter_word = Counter(words)
    
    # considered heap rule, we need to make the top frequentist words's index number small
    data =  [(-counter_word[word], word) for word in counter_word]

    # data to heap
    heapq.heapify(data)

    # retrieve three of the frequentist words
    return [heapq.heappop(data)[1] for _ in range(n)]

if __name__ == '__main__':
    w = ['python', 'c', 'java', 'python', 'c', 'go', 'python']
    print(top_n_with_heap(w, 3))