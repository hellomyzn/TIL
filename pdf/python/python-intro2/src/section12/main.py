# 集合型(set)
# pra12

employees = [[101, '青木', '横浜'], [103, '井上', '桜木町'], [105, '伊藤', '桜木町'], [107, '上田', '関内'], [110, '江藤', '石川町'], [115, '太田', '山手']]
address = set()
for e in employees:
    address.add(e[2])
print(address)

# q12_1
address.add('根岸')
print(address)

# q12_2
print(address.pop())
print(address)

# q12_3
print(address.discard('磯野'))
print(address)
print(address.remove('磯野'))
print(address)
