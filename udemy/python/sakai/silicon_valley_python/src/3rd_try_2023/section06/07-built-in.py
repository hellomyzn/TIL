print(globals())

ranking = {
    'A': 100,
    'B': 82,
    'C': 94,
}

print(sorted(ranking))
print(sorted(ranking, key=ranking.get))
print(sorted(ranking, key=ranking.get, reverse=True))
