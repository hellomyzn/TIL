import random

import list_generator
import bubble_sort
import insertion_sort
import selection_sort

order_lists = ["fibonacci_random_order", "fibonacci_descending_order", "self_order"]
algorithm_lists = ["bubble_sort", "insertion_sort", "selection_sort"]
line = "\n\n==============================================\n"
A = []


if __name__ == "__main__":

    is_continue = True

    while is_continue:
        print(line,"どのようにListを作りますか？", line)
        for i, list_name in enumerate(order_lists):
            print("\n[", i, "] : ", list_name)
        input_num = int(input())


        # ランダムのfibonacciのリスト生成
        if input_num == 0:
            A = list_generator.fib_generator()
            random.shuffle(A)
        # 降順のfibonacciのリスト生成
        elif input_num == 1:
            A = list_generator.fib_generator()
            A.reverse()
        # 自分でリスト作成
        elif input_num == 2:
            A =  list_generator.self_generator()
        else:
            print("入力値が正しくありません")

        print(line, A, "\n" , line)

        # アルゴリズムの選択
        print(line, "何のアルゴリズムを試しますか？", line)
        for i, algo_name in enumerate(algorithm_lists):
            print("\n[", i, "] : ", algo_name)
        input_num = int(input())


        print(line)
        if input_num == 0:
            bubble_sort.bubbleSort(A, len(A))
        elif input_num == 1:
            insertion_sort.insertionSort(A, len(A))
        elif input_num == 2:
            selection_sort.selectionSort(A, len(A))
        else:
            print("入力値が正しくありません")
        print(line)
