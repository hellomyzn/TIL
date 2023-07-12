l = ['Mon', 'tue', 'Wed', 'Thu', 'fri', 'sat', 'Sun']


def change_words(words, func):
    """e.g."""
    for word in words:
        print(func(word))


def sample_func(word):
    """e.g."""
    return word.capitalize()


change_words(l, sample_func)


def sample_func2(word): return word.capitalize()
def sample_func3(word): return word.lower()


change_words(l, sample_func2)
change_words(l, sample_func3)
