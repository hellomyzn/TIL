from __future__ import annotations
from typing import Any
from typing import Optional


class Node(object):
    def __init__(self, data: Any, next_node: Node = None, prev_node: Node = None ) -> None:
        self.data = data
        self.next = next_node
        self.prev = prev_node


class DoublyLinkedList(object):
    def __init__(self, head: Node = None) -> None:
        self.head = head

    def append(self, data: Any) -> None:
        new_node = Node(data)
        if self.head is None:
            self.head = new_node
            return 
        
        current_node = self.head
        while current_node.next:
            current_node = current_node.next
        
        current_node.next = new_node
        new_node.prev = current_node
        

    def insert(self, data: Any) -> None:
        new_node = Node(data)
        if self.head is None:
            self.head = new_node
            return

        self.head.prev = new_node
        new_node.next = self.head
        self.head = new_node


    def print(self) -> None:
        current_node = self.head
        while current_node:
            print(current_node.data)
            current_node = current_node.next
    

    def remove(self, data: Any) -> None:
        current_node = self.head
        if current_node and current_node.data == data:
            if current_node.next is None:
                current_node = None
                self.head = None
                return
            else:
                next_node = current_node.next
                next_node.prev = None
                current_node = None
                self.head = next_node
                return

        while current_node and current_node.data != data:
            current_node = current_node.next

        if current_node is None:
            return
        
        if current_node.next is None:
            prev = current_node.prev
            prev.next = None
            current_node = None
            return 
        else:
            next_node = current_node.next
            prev_node = current_node.prev
            prev_node.next = next_node
            next_node.prev = prev_node
            current_node = None
            return 


    def reverse_iterative(self) -> None:
        """
            List: [1,2,3]
            current_node = Node(1)
            while Node(1):
                previous_node = None
                Node(1).prev = Node(2)
                Node(1).next = None

                current_node = Node(2)
                [2, 1]
            while Node(2):
                previous_node = Node(1)
                Node(2).prev = Node(3)
                Node(2).next = Node(1)

                current_node = Node(3)
                [3,2,1]
            while Node(3):
                previous_node = Node(2)
                Node(3).prev = None
                Node(3).next = Node(2)

                current_node = None
                [3,2,1]
            self.head = Node(3)
        """
        previous_node = None
        current_node = self.head

        while current_node:
            previous_node = current_node.prev
            current_node.prev = current_node.next
            current_node.next = previous_node

            current_node = current_node.prev
        
        if previous_node:
            self.head = previous_node.prev


    def reverse_recursive(self) -> None:
        """
        List: [1,2,3]
        _reverse_recursive(Node(1)):
            previous_node = None
            Node(1).prev = Node(2)
            Node(1.).next = None

            _reverse_recursive(Node(2)):
                previous_node = Node(1)
                Node(2).prev = Node(3)
                Node(2.).next = None(1)

                _reverse_recursive(Node(3)):
                    previous_node = Node(2)
                    Node(3).prev = None
                    Node(3.).next = Node(2)

                    if Node(3).prev is None:
                        return Node(3)
        self.head = Node(3)
        """
        def _reverse_recursive(current_node: Node) -> Optional[Node]:
            if not current_node:
                return None

            previous_node = current_node.prev
            current_node.prev = current_node.next
            current_node.next = previous_node

            if current_node.prev is None:
                return current_node
            
            return _reverse_recursive(current_node.prev)

        self.head = _reverse_recursive(self.head)

if __name__ == '__main__':
    d = DoublyLinkedList()
    d.append(1)
    d.append(2)
    d.append(3)
    d.insert(4)
    d.print()

    print('removed')
    d.remove(2)
    d.print()

    print('reverse_iterative')
    d.reverse_iterative()
    d.print()

    print('reverse_recursive')
    d.reverse_recursive()
    d.print()