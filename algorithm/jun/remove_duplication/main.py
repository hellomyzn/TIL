"""
[1,3,3,5,5,7,7,7,10,12,12,15] => [,13,5,7,10,12,15]
"""
l = [1,3,3,5,5,7,7,7,10,12,12,15]
print(list(set(l)))
print(list(dict.fromkeys(l)))
print([ n for i , n in enumerate(l) if n not in l[:i]])



