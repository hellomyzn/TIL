import csv


with open('test.csv', 'w') as c:
    fieldnames = ['Name', 'Count']
    writer = csv.DictWriter(c, fieldnames=fieldnames)
    writer.writeheader()
    writer.writerow({'Name': 'A', 'Count': 1})
    writer.writerow({'Name': 'B', 'Count': 2})

with open('test.csv', 'r') as c:
    reader = csv.DictReader(c)
    for row in reader:
        print(row['Name'], row['Count'])
