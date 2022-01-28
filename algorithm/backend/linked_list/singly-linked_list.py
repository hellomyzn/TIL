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


    def reverse_iterative(self) -> None:
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
            l.reverse_iterative(): current_node = Node(1)
                                    while Node(1)
                                        next_node = Node(2)
                                        Node(1).next = None
                                        previous_node = Node(1)
                                        current_node = Node(2)
                                    while Node(2)
                                        next_node = Node(3)
                                        Node(2).next = Node(1)
                                        previous_node = Node(2)
                                        current_node = Node(3)
                                    while Node(3)
                                        next_node = None
                                        Node(3).next = Node(2)
                                        previous_node = Node(3)
                                        current_node = None
                                    self.head = Node(3)
                         
        """
        previous_node = None
        current_node = self.head
        while current_node:
            next_node = current_node.next
            current_node.next = previous_node
            previous_node = current_node
            current_node = next_node

        self.head = previous_node


    def reverse_recursive(self) -> None:
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
            l.reverse_recursive():
                _reverse_recursive(Node(1), None):
                    next_node = Node(2)
                    Node(1).next = None
                    previous_node = Node(1)
                    current_node = Node(2)

                    _reverse_recursive(Node(2), Node(1)):
                        next_node = Node(3)
                        Node(2).next = Node(1)
                        previous_node = Node(2)
                        current_node = Node(3)

                        _reverse_recursive(Node(3), Node(2)):
                            next_node = None
                            Node(3).next = Node(2)
                            previous_node = Node(3)
                            current_node = None

                            _reverse_recursive(None, Node(3)):
                self.head = Node(3)
                         
        """
        def _reverse_recursive(current_node: Node, previous_node: Node):
            if not current_node:
                return previous_node
            
            next_node = current_node.next
            current_node.next = previous_node
            previous_node = current_node
            current_node = next_node
            return _reverse_recursive(current_node, previous_node)

        self.head = _reverse_recursive(self.head, None)

if __name__ == '__main__':
    l = LinkedList()
    l.append(1)
    l.append(2)
    l.append(3)
    l.insert(9)
    l.print()
    l.remove(2)
    print('#########')
    l.print()
    l.reverse_iterative()
    print('#########')
    l.print()
    l.reverse_recursive()
    print('#########')
    l.print()

