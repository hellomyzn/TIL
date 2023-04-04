# リスト方
list11 = [1, 2, 4, 5, 6]
list13 = [x for x in range(10)]
list31 = list((1,2,3,4,5))
list32 = list(range(1,6))
list33 = list('Python')
list41 = list11 + list13

print(list11)
print(list13)
print(list31)
print(list32)
print(list33)
print(list41)

# pra10_1
emp = [101, 'Aoki', 'Yokohama']
print('社員番号: ', emp[0])
print('名前: ', emp[1])
print('住所: ', emp[2])

emp[2] = 'Ebina'
print('住所: ', emp[2])


# pra10_2
employees = [[101, '青木', '横浜'], [103, '井上', '桜木町'], [107, '上田', '関内'], [110, '江藤', '石川町'], [115, '太田', '山手']]
salaries = [[101, 28.5], [103, 26.8], [107, 31], [110, 30.5], [115, 35]]

for idx in range(len(employees)):
    for salary in salaries:
        if employees[idx][0] == salary[0]:
            employees[idx].append(salary[1])
            break
print(employees)


# pra10_3
employee = [105, '伊藤', '桜木町', 36]
employees.insert(2, employee)
print(employees)


# pra10_4
employees.sort(key=lambda x: x[3], reverse=True)
print(employees)


# q10_1
odd = [x for x in range(1,31)]
print(odd)
# q10_2
print(odd[-3])
# q10_3
print(odd.index(21))
