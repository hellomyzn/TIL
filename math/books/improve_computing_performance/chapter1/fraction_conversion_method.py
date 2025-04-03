import random
import time
import timeout_decorator



@timeout_decorator.timeout(5)
def test():
    return 0


def calculator(random_number):
    number_a = random_number / 100
    while True:
        number_a = 1 / number_a
        number_a = round(number_a, 7)
        if str(number_a).split('.')[1][0] is "0":
            break
        else:
            number_b = str(number_a).split('.')[0]
            number_a = number_a - int(number_b)
    number_a = round(number_a, 1)
    child = round(((random_number / 100) * number_a), 0)

    while True:
        if str(child).split('.')[0] is "0":
            child = child * 10
            number_a = number_a * 10
        else:
            break
    
    while True:
        if str(child).split('.')[1][0] is "0":
            break
        else:
            child, number_a = child * 2, number_a * 2
    answer = "%s / %s" % (child, number_a)
    return answer



if __name__ == "__main__":
    answers = []
    currects = []
    line = "\n\n=====================================\n\n"

    for _ in range(5):
        random_number = random.randrange(5, 100, 10)
        random_number = 15
        currects.append(calculator(random_number))

        try:
            print(line)
            answers.append(test(random_number))
        except:
            print("test timed out :(")
            answers.append("missed")
    print("test finished :)")
    print(line)
    print(answers)
    print(currects)



