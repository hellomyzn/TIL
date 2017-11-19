# 関数の定義
def post_review():
    # 変数の定義
    post = {}
    print("ジャンルを入力してください：")
    post["genre"] = input()
    print("タイトルを入力してください：")
    post["title"] = input()
    print("感想を入力してください：")
    post["review"] = input()
    line = "\n---------------------------"

    # レビューの描画
    print("ジャンル :" + post["genre"] + line)
    print("タイトル:" + post["title"] + line)
    print("感想 : " + post["review"] + line)

    posts.append(post)
    return posts


def read_reviews():
    for (i, post) in enumerate(posts):
        print('[' + str(i) + ']:' + post['title'] + "のレビュー")
    print("見たいレビューの番号を入力してください：")
    user_input = int(input())

    post = posts[user_input]

    line = "\n---------------------------"
    print("ジャンル : " + post["genre"] + line)
    print("タイトル : " + post["title"] + line)
    print("感想 : " + post["review"] + line)


def end_program():
    exit()


def exception():
    print("入力された値は無効な値です")


posts = []

while True:
    # メニューの表示
    print("レビュー数：" + str(len(posts)))
    print("[0]レビューを書く")
    print("[1]レビューを読む")
    print("[2]アプリを終了する")
    user_input = int(input())

    if user_input == 0:
        post_review()        # post_review()関数の呼び出し
    elif user_input == 1:
        read_reviews()       # end_program関数の呼び出し
    elif user_input == 2:
        end_program()        # end_program関数の呼び出し
    else:
        exception()          # exception()関数の呼び出し
