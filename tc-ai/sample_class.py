class Review:
    review_count = 0

    @classmethod
    def get_review_count(cls):
        return cls.review_count

    def __init__(self):
        print("タイトルを入力してください")
        self.title = input()
        print("ジャンルを入力してください")
        self.genre = input()
        print("感想を入力してください")
        self.impression = input()
        Review.review_count += 1

    def show_review(self):
        line = "\n---------------------------"
        print("ジャンル : " + self.genre + line)
        print("タイトル : " + self.title + line)
        print("感想 : " + self.impression + line)

while True:
    # メニューの表示
    print("書いたレビューの数：" + str(Review.get_review_count()))
    print("[0]レビューを書く")
    print("[1]アプリを終了")
    user_input = int(input())

    # レビューを書く
    if user_input == 0:
        review = Review()
        review.show_review()
    elif user_input == 1:
        # アプリを終了
        exit()
    else:             # その他の入力
        print("入力された値は無効な値です")
