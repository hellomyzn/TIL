s = """\
AAA
BBB
CCC
DDD
"""


with open('test.txt', 'w', encoding='utf-8') as f:
    f.write(s)


with open('test.txt', 'r', encoding='utf-8') as f:
    print(f.tell())
    print(f.read(1))
    f.seek(5)
    print(f.read(1))
    f.seek(14)
    print(f.read(1))
    f.seek(15)
    print(f.read(1))
    f.seek(5)
