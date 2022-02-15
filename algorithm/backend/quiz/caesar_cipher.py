import string

def caesar_cipher_with_string(text: str, shift: int) -> str:
    result = ''
    for char in text:
        if char.isupper():
            alphabet = string.ascii_uppercase
        elif char.islower():
            alphabet = string.ascii_lowercase
        else:
            result += char
            continue
        index = (alphabet.index(char) + shift) % len(alphabet)
        result += alphabet[index]

    return result

def caesar_cipher_without_string(text: str, shift: int) -> str:
    result = ''
    len_alphabet = ord('Z') - ord('A') + 1
    for char in text:
        if char.isupper():
            result += chr((ord(char) + shift - ord('A')) % len_alphabet + ord('A'))
        elif char.islower():
            result += chr((ord(char) + shift - ord('a')) % len_alphabet + ord('a'))
        else:
            result += char

    return result


if __name__ == '__main__':
    s = 'Hello Myzn $$$ ### !!!'
    e = caesar_cipher_with_string(s, 3)
    print(e)
    print(caesar_cipher_without_string(s, 3))
    
    print(caesar_cipher_with_string(e, -3))
