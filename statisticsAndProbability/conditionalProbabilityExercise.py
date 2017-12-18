from numpy import random

"""
条件付確率 アクティビティ＆演習
以下は、各年齢の範囲においてどれだけ商品を購入するかを示すフェイクのデータを生成するコードです。

100,000人を作り、ランダムに10代、20台、30代、40代、50代、60代、70代と年齢範囲を振っていきます。

若い人には購入確率を低く設定します。

最後には、２つのPythonのディクショナリを得ます。

"totals" は各年齢範囲に属する人数、"purchases"は各年齢範囲の人々が購入した商品の数を含む
ディクショナリです。 totalPurchases は総購入数です。そして、総人数は100,000人ですね。

コードを走らせて、結果を見てみましょう。
"""

random.seed(0)

totals = {20: 0, 30: 0, 40: 0, 50: 0, 60: 0, 70: 0}
purchases = {20: 0, 30: 0, 40: 0, 50: 0, 60: 0, 70: 0}

totalPurchases = 0

for _ in range(100000):
    ageDecade = random.choice([20, 30, 40, 50, 60, 70])
    purchasesProbability = float(ageDecade) / 100.0
    totals[ageDecade] += 1
    if (random.random() < purchasesProbability):
        totalPurchases += 1
        purchases[ageDecade] += 1

totals
purchases
totalPurchases

"""
条件付確率で遊びましょう。

最初に、P(E|F)を計算しましょう。Eは購入すること、Fは30代であることとします。
30代の人が商品を購入する確率は、購入数を人数で割ることで求めます。
"""

PEF = float(purchases[30]) / float(totals[30])
print("P(purchases|30s):" + str(PEF))

"""
P(F)は30代である確率です。
"""

PF = float(totals[30]) / 100000.0
print("P(30's):" + str(PF))

"""
そして、P(E)は年齢に関係ない、全体の購入確率です。
"""

PE = float(totalPurchases) / 100000.0
print("P(Purchase):" + str(PE))

"""
もし、EとFが無関係であるならば、P(E|F)とP(E)はほぼ同じになるはずです。しかしながら、
P(E)は0.45、P(E|F)は0.3で大きく異なる値です。従って、EとFには依存関係があります。

それでは、P(E)とP(F)の積はいくつになるでしょうか?
"""

print("P(30's)P(Purchase)" + str(PE * PF))

"""
P(E,F)はP(E|F)とは異なります。 P(E,F)は30代であり、購入したという両者を満たす確率です。
総人口における確率であって、30代の中での確率ではありません。
"""

print("P(30's, Purchase)" + str(float(purchases[30]) / 100000.0))

"""
P(E,F)と P(E)P(F)は近いですね。しかしながら、EとFが依存関係にあり、
データのランダム性もあるので同じ値にはなりません。

それでは、P(E|F) = P(E,F)/P(F)の関係を確かめてみましょう。
"""
print((purchases[30] / 100000.0) / PF)
