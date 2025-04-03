"""
Input {'key1': 'value1', 'key2': [1,2,3], 'key3': (1,2,3)}  Output True
Input {'key1': ['value1', 'key2': [1,2,3], 'key3': (1,2,3)}  Output False
"""

def validate_format(chars: str) -> bool:
    lookup = {'{': '}', '[': ']', '(': ')'}
    stack = []
    for char in chars:
        if char in lookup.keys():
            stack.append(lookup[char])
        if char in lookup.values():
            if not stack:
                print("There is no stack")
                return False
            if char != stack.pop():
                print(f"Difference of key{char}")
                return False
    if stack:
        print(f"There is still {stack}")
        return False
    
    return True


if __name__ == '__main__':
    j = "{'key1': 'value1', 'key2': [1,2,3], 'key3': (1,2,3)}"
    print(validate_format(j))
