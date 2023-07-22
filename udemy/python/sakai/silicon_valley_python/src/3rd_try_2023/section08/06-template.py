import string


s = """\
Hi $name.

$contents

Have a good day
"""

with open('./designs/email-template.txt', 'r', encoding='utf-8') as f:
    t = string.Template(f.read())
contents = t.substitute(name='Mike', contents="How are you?")
print(contents)

t = string.Template(s)
contents = t.substitute(name='Mike', contents="How are you?")
print(contents)
