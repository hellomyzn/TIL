import random
import time
import timeout_decorator


@timeout_decorator.timeout(5)
def test(number_a, number_b) ->int:
    answer = input(" %d x %d = " % (number_a, number_b))
    if answer is "":
        answer = "missed"
    return answer


if __name__ == "__main__":
    answers = []
    currects = []
    line = "\n\n=====================================\n\n"

    for _ in range(5):
        random_number = random.randrange(10, 101, 10)
        sub = random.randrange(1, 5)
        number_a = random_number - sub
        number_b = random_number + sub
        currect = number_a * number_b
        currects.append(currect)

        try:
            print(line)
            answers.append(test(number_a, number_b))
        except:
            print("test timed out :(")
            answers.append("missed")

    print("test finished :)")
    print(line)
    print(answers)
    print(currects)

