from typing import Any

class Node(object):
    def __init__(self, data: Any, next_node: None =None):
        self.data = data
        self.next = next_node


class LinkedList(object):
    def __init__(self, head=None) -> None:
        self.head = head

    def append(self, data: Any) -> None:
        """    
            l = LinkedList(): head = None
            l.append(1): new_node =  Node(1)
                         self.head = Node(1)
            l.append(2): new_node =  Node(2)
                         last_node = Node(1)
                         Node(1).next = Node(2)
            l.append(3): new_node =  Node(3)
                         last_node = Node(2)
                         Node(2).next = Node(3)
            ...
        """
        new_node = Node(data)
        if self.head is None:
            self.head = new_node
            return 
        
        last_node = self.head
        while last_node.next:
            last_node = last_node.next
        last_node.next = new_node
    
    def insert(self, data: Any) -> None:
        """    
            l.append(1): new_node =  Node(1)
                         self.head = Node(1)
            l.append(2): new_node =  Node(2)
                         last_node = Node(1)
                         Node(1).next = Node(2)
            l.append(3): new_node =  Node(3)
                         last_node = Node(2)
                         Node(2).next = Node(3)
            ...
            l.insert(9): new_node =  Node(9)
                         Node(9).next = Node(1)
                         self.heae = Node(9)
        """
        new_node = Node(data)
        new_node.next = self.head
        self.head = new_node

    def print(self) -> None:
        current_node = self.head
        while current_node:
            print(current_node.data)
            current_node = current_node.next

    def remove(self, data: Any) -> None:
        """    
            l.append(1): new_node =  Node(1)
                         self.head = Node(1)
            l.append(2): new_node =  Node(2)
                         last_node = Node(1)
                         Node(1).next = Node(2)
            l.append(3): new_node =  Node(3)
                         last_node = Node(2)
                         Node(2).next = Node(3)
            ...
            l.insert(9): new_node =  Node(9)
                         Node(9).next = Node(1)
            
            l.remove(1): current_node = Node(9)
                         while current_node and current_node.data != data:
                            previous_node = Node(9)
                            current_node = Node(1)
                        Node(9).next = Node(2)
            
            l.remove(3): current_node = Node(9)
                        while current_node and current_node.data != data:
                            previous_node = Node(9)
                            current_node = Node(2)
                        while current_node and current_node.data != data:
                            previous_node = Node(2)
                            current_node = Node(3)
                        Node(2).next = None
        """

        current_node = self.head
        if current_node and current_node.data == data:
            self.head = current_node.next
            current_node = None
            return 

        previous_node = None
        while current_node and current_node.data != data:
            previous_node = current_node
            current_node = current_node.next

        if current_node is None:
            return 
        previous_node.next = current_node.next
        current_node = None

if __name__ == '__main__':
    l = LinkedList()
    l.append(1)
    l.append(2)
    l.append(3)
    l.insert(9)
    l.print()
    l.remove(3)
    print('#########')
    l.print()
