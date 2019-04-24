import random


how_many_times = int(input("試行回数を入力してください"))
your_choice = int(input("[0, 1, 2] どの数字を選択しますか?"))
correct_num = 0
changing_correct_num = 0

for _ in range(how_many_times):

    answer_num = random.randrange(3)
    if answer_num == your_choice:
        correct_num += 1
    else:
        changing_correct_num += 1


no_change_average = (correct_num / how_many_times)*100
change_average = (changing_correct_num / how_many_times)*100

print(no_change_average)
print(change_average)
