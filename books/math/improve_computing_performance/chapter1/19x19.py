import random
import time
import timeout_decorator


@timeout_decorator.timeout(5)
def test(random_number1, random_number2) -> int:
    answer = input("%d x %d = " % (random_number1, random_number2))
    if answer == "":
        answer  = "missed"
    return answer


if __name__ == "__main__":
    answers = []
    currects = []
    line = "\n\n=====================================\n\n"


    for _ in range(5):
        random_number1 = random.randrange(1, 20)
        random_number2 = random.randrange(1, 20)
        currect = random_number1 * random_number2
        currects.append(currect)

        try:
            print(line)
            answers.append(test(random_number1, random_number2))
        except:
            print("test timed out :(")
            answers.append("missed")

    print("test finished :)")
    print(line)
    print(answers)
    print(currects)
