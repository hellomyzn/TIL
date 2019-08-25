import random
import time
import timeout_decorator


@timeout_decorator.timeout(5)
def test_start(even, multiple_of_5) -> int:
    answer = input("%d x %d = " % (even, multiple_of_5))
    if answer is "":
        answer = "missed"
    return answer


if __name__ == '__main__':
    answers = []
    currects  = []
    line = "\n\n=====================================\n\n"

    for i, _ in enumerate(range(5)):
        even = random.randrange(2, 20, 2)
        multiple_of_5 = random.randrange(5, 100, 5)
        currect = even * multiple_of_5
        currects.append(currect)

        try:
            print(line)
            answers.append(test_start(even, multiple_of_5))
        except:
            print ("test timed out :(")
            answers.append("missed")
    print("test finished :)")
    print(line)
    print(answers)
    print(currects)
