from collections import deque
from typing import Any

class Queue(object):
    def __init__(self) -> None:
        self.queue = []

    def enqueue(self, data: Any) -> None:
        self.queue.append(data)

    def dequeue(self) -> Any:
        if self.queue:
            return self.queue.pop(0)

    def reverse(self):
        new_queue = Queue()
        while self.queue:
            new_queue.enqueue(self.queue.pop())
        return new_queue

if __name__ == '__main__':
    q = Queue()
    q.enqueue(1)
    q.enqueue(2)
    q.enqueue(3)
    q.enqueue(4)
    print(q.queue)
    q = q.reverse()
    print(q.queue)
    q = q.reverse()
    print(q.dequeue())
    print(q.dequeue())
    print(q.dequeue())
    print(q.dequeue())
    print(q.queue)
    
    dq = deque()
    dq.append(1)
    dq.append(2)
    dq.append(3)
    dq.append(4)
    print(dq)
    dq.reverse()
    print(dq)
    dq.reverse()
    print(dq.popleft())
    print(dq.popleft())
    print(dq.popleft())
    print(dq.popleft())