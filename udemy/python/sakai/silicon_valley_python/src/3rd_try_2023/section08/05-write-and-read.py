s = """\
AAA
BBB
CCC
DDD
"""


with open('test.txt', 'w+', encoding='utf-8') as f:
    f.write(s)
    f.seek(0)
    print(f.read())

with open('test.txt', 'r+', encoding='utf-8') as f:
    print(f.read())
    f.seek(0)
    f.write(s)
