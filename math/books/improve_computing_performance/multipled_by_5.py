import random
import time
import timeout_decorator


@timeout_decorator.timeout(5)
def test(random_number) -> int:
    answer = 0
    answer = input("%d x 5 = " % random_number)
    if answer is "":
        answer = "missed"
    return answer



if __name__ == "__main__":

    answers = []
    currects = []
    line = "\n\n=====================================\n\n"

    for _ in range(5):
        random_number = random.randrange(10, 1000)
        currect = random_number * 5
        currects.append(currect)

        try:
            print(line)
            answers.append(test(random_number))
        except:
            print ("test timed out :(")
            answers.append("missed")
    print("test finished :)")
    print(line)
    print(answers)
    print(currects)
