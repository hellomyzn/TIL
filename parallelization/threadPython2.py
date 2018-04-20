import logging
import threading
import queue
import time


logging.basicConfig(
    level=logging.DEBUG, format='%(threadName)s: %(message)s')

def worker1(queue):
    logging.debug('start')
    while True:
        item = queue.get()
        if item is None:
            break
        logging.debug(item)
        queue.task_done()

    logging.debug('logggggggggggggggggggggggggggggggggggggg')
    logging.debug('end')

if __name__ == '__main__':
    queue = queue.Queue()
    for i in range(100000):
        queue.put(i) # queueに値を追加している
    ts = []
    for _ in range(3): # 100000万行のデータを3つのスレッドで処理をする
        t = threading.Thread(target=worker1, args=(queue,))
        t.start()
        ts.append(t)
    logging.debug('tasks are not done')
    queue.join()
    logging.debug('task are done')

    for _ in range(len(ts)):
        queue.put(None)


    [t.join() for t in ts]
