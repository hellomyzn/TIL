from typing import List


"""
flagを用いたバブルソート
"""

def bubbleSort(A=None, N=1):
    sw = 0
    flag = True
    count = 1
    while flag:
        i = 0
        j = N -1
        flag = False

        for i in range(j, i, -1):
            if(A[i] < A[i -1]):
                A[i], A[i -1] = A[i -1], A[i]
                flag = True
                sw += 1

            # j -= 1

        print(count, "回目")
        print(A, "\n")
        # i += 1
        count += 1
    return sw


# from Jun Sakai lesson
def bubble_sort(numbers: list[int]) -> list[int]:
    line = "=" * 80
    print(f"\n\n{line}")
    print(f"bubble_sort  | [INFO] - Start: {numbers}\n")
    
    trials_num = 0
    sorts_num = 0
    len_numbers = len(numbers)

    for i in range(len_numbers):
        for j in range(len_numbers -1 -i):
            trials_num = trials_num + 1
            if numbers[j] > numbers[j+1]:
                sorts_num = sorts_num + 1
                numbers[j+1], numbers[j] = numbers[j], numbers[j+1]

    print(f"bubble_sort  | [INFO] - Result of List: {numbers}\n")
    print(f"bubble_sort  | [INFO] - Number of traials: {trials_num}")
    print(f"bubble_sort  | [INFO] - Number of sorts:  {sorts_num}")
    print(f"{line}\n\n")

    return numbers



if __name__ == "__main__":

    # OLD CODES...

    # A = []
    # N = int(input("\n数列の長さを入力してください\n"))
    # line = "===========================\n"
    # for i in range(N):
    #     A.append(int(input(i, "個目の要素を入力してください\n")))
    # print(line, A,"\n", line)
    # sw = bubbleSort(A, N)


    # FROM JUN SAKAI LESSON
    import random
    nums = [random.randint(0,1000) for _ in range(10)] 
    bubble_sort(nums)



