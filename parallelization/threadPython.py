import logging
import threading
import time


logging.basicConfig(
    level=logging.DEBUG, format='%(threadName)s: %(message)s')

def worker1():
    logging.debug('start')
    time.sleep(5)
    logging.debug('end')


def worker2():
    logging.debug('start')
    time.sleep(2)
    logging.debug('end')

if __name__ == '__main__':

    t = threading.Timer(3, worker1)
    t.start()

    # for _ in range(5):
    #     t = threading.Thread(target=worker1)
    #     t.setDaemon(True) #このt1の処理が長い時にまたないで処理を終了する
    #     t.start()
    #
    # print(threading.enumerate())
    # for thread in threading.enumerate():
    #     if thread is threading.currentThread():
    #         print(thread)
    #         continue
    #     thread.join()
    #
    #
    #
    # t2 = threading.Thread(target=worker2)
    # t1.start() #スレッドが走る
    # t2.start()
    #
    # print('started')
    #
    # t1.join()　# setDeamonしたやつでも処理が終わるまで待つ
    # t2.join()　#デーモン化してないやつでも明示的に書くのが暗黙の了解
