from bs4 import BeautifulSoup
from pandas import Series, DataFrame
import requests
import pandas as pd


"""
PythonでWebスクレイピング
Web上のデータを、取得して、その構造を理解し、pandasのDataFrameにします。
いくつか注意すべき事項を並べておきます。
1.) Web上のデータだからと言って、勝手に利用していいとは限りませんので、利用する前に確認しておきましょう。

2.) プログラムで連続的にサーバに負荷をかけると、先方にブロックされて接続できなくなる危険性もありますので、注意しましょう。

3.) Webサイトのデザインが変わることは、日常茶飯ですので、時間が経ったら、コードを見直す必要があるかも知れません。

4.) Webページは、データの取得用に作られていませんので、取得したデータをクレンジングする（エラーなどを取り除いて整形する作業）する必要は大いにあります。

5.) というわけで、やはりWebページごとにコードを書いてデータ取得の方法をカスタマイズする必要はあります。

やはりHTMLについて知っておく必要はあります
書籍を使ってしっかり学ぶのが良いかと思いますが、以下の様なサイトも参考になると思います。

HTMLクイックリファレンス

W3School(英語)

準備
それぞれ、Webスクレイピングのために必要なモジュールです。セットアップされていない場合は、インストールして使えるようにしておきましょう。

1.) BeautifulSoup
http://www.crummy.com/software/BeautifulSoup/bs4/doc/
OSのコマンドプロンプト（ターミナル）で、
pip install beautifulsoup4
またはAnacondaを利用している場合
conda install beautifulsoup4

2.) lxml
http://lxml.de/
pip install lxml
または
conda install lxml

3.) requests
http://docs.python-requests.org/en/latest/
pip install requests
または
conda install requests
"""

"""

サンプルデータは何でも良いんですが、ここではカリフォルニア大学のページから、予算に関する報告書のページを扱ってみます。もちろん他のページも良いですが、データの利用については、注意してください。

今回取得するデータのURLです。
"""


url = 'http://www.ucop.edu/operating-budget/budgets-and-reports/legislative-reports/2013-14-legislative-session.html'
result = requests.get(url)
c = result.content
print(c)

# HTMLを元にオブジェクトを作る
soup = BeautifulSoup(c, "lxml")
# Beautiful Soupを使って、HTMLを扱う準備が出来ました。

# 目的の部分を切り出します。
summary = soup.find("div", {"class": "list-land", "id": "content"})
# tableを見つけます。
table = summary.find_all("table")

"""
通常、HTMLのテーブルでは、trタグで1行を表現し、tdタグでその中にいくつか列を作っていくイメージです。

ですので、trを見つけて、その中からtdを探し出します。

ここで紹介するのは、Beautiful Soupのごくごく一部の機能です。詳しく知りたい方はドキュメントを参照してください。.
"""

# データを格納するためのリスト
data = []

# テーブルから行を全て探し出します
rows = table[0].find_all("tr")
# 行から、それぞれのcellを取り出して画面に表示しつつ、dataに格納します。

for tr in rows:
    cols = tr.find_all('td')
    # textを探し出します。
    for td in cols:
        text = td.find(text=True)
        print(text)
        data.append(text)
data
len(data)

"""
pdfがある行だけ抜き出すことにしましょう。¥xa0はエラーなので、空白に置き換えます。
"""

reports = []
date = []

# 行を保持する変数を用意します。
index = 0
# pdfの文字列があるcellを見つけだします。
for item in data:
    if 'pdf' in item:
        # 1つもどって、日付を格納します。
        date.append(data[index - 1])
        # \xa0 を取り除いておきましょう。
        reports.append(item.replace(u'\xa0', u' '))

    index += 1

"""
'\xa0 'はユニコードのエラーなのですが、Webページは必ずしも綺麗に整形されているデータではありませんので、このように予期せぬ出来事が頻発します。その都度、調べて解決していけば、きっとスキルが上がります。

あとはデータをpandasのDataFrameにするだけです。
"""
# まずはそれぞれをSeriesにします。
data = Series(data)
reports = Series(reports)

# 連結してDataFrameにします。
legislative_df = pd.concat([data, reports], axis = 1)
legislative_df.columns = ['Date', 'Reports']

legislative_df

"""

Webスクレイピングは楽しいですが、面倒です。

これを生業にしている企業もあるようです。ご興味があれば、チェックしてみてください。

https://import.io/

https://www.kimonolabs.com/
"""
