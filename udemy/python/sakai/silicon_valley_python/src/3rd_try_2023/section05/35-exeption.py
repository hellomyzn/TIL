l = [1, 2, 3]
i = 5
del l

try:
    ()+l
    l[i]
except IndexError as e:
    print(f"Don't worry {e}")
except NameError as e:
    print(e)
except Exception as e:
    print(f"other: {e}")
else:
    print('done')
finally:
    print("clearn up")
