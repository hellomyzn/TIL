import random
import time
import timeout_decorator


@timeout_decorator.timeout(5)
def test(base_number, random_number)->int:
    answer = input("%d ^ %d = " % (base_number, random_number))
    if answer is "":
        answer = "missed"
    return answer


if __name__ == "__main__":
    answers = []
    currects = []
    line = "\n\n=====================================\n\n"

    try:
        print(line)
        random_number = random.randrange(1, 17)
        currects.append(2 ** random_number)
        answers.append(test(2, random_number))
    except:
        print("test timed out :")
        answers.append("missed")


    try:
        print(line)
        random_number = random.randrange(1, 17)
        currects.append(2 ** random_number)
        answers.append(test(2, random_number))
    except:
        print("test timed out :")
        answers.append("missed")

    try:
        print(line)
        random_number = random.randrange(1, 17)
        currects.append(2 ** random_number)
        answers.append(test(2, random_number))
    except:
        print("test timed out :")
        answers.append("missed")

    try:
        print(line)
        random_number = random.randrange(1, 7)
        currects.append(3 ** random_number)
        answers.append(test(3, random_number))
    except:
        print("test timed out :")
        answers.append("missed")

    try:
        print(line)
        random_number = random.randrange(1, 6)
        currects.append(5 ** random_number)
        answers.append(test(5, random_number))
    except:
        print("test timed out :")
        answers.append("missed")

    print("test finished :)")
    print(line)
    print(answers)
    print(currects)


