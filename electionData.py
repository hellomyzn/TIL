
import pandas as pd
import numpy as numpy
import matplotlib.pyplot as plt
import seaborn as sns
# Webからデータを取得するために、requestsをインポートします。
import requests
from pandas import Series, DataFrame
# CSVデータのために、StringIOをつかいます。
from io import StringIO
sns.set_style("whitegrid")


"""
    選挙のデータ解析（世論調査と寄付）
    このレクチャーでは、2012年のアメリカ大統領選挙について扱います。
    その内容にあまり詳しくない方は、以下が参考になると思います。
    https://ja.wikipedia.org/wiki/2012%E5%B9%B4%E3%82%A2%E3%83%A1%E3%83%AA%E3%\
        82%AB%E5%90%88%E8%A1%86%E5%9B%BD%E5%A4%A7%E7%B5%B1%E9%A0%98%E9%81%B8%E6%8C%99

    基本的には民主党のオバマ候補と、共和党のロムニー候補の争いで、オバマ候補が勝利しました。
    最初は、世論調査結果のデータを扱います。以下のような問題を設定してみましょう。
    1.) どのような人達が調査対象だったか？
    2.) 調査結果は、どちらの候補の有利を示しているか？
    3.) 態度未定の人達が世論調査に与えた影響は？
    4.) また、態度未定の人たちの動向は？
    5.) 投票者の気持ちは、時間ともにどう変化したか？
    6.) 討論会の影響を世論調査の結果から読み取ることができるか？

    2つ目のデータセットについては、後半で。
    まずはいつものように、必要なものをインポートします
"""


"""
    データは、HuffPost Pollsterから持ってきます。サイトはこちら.
    http://elections.huffingtonpost.com/pollster
    米国の選挙のデータですが、
    このコースが終わったあとに、このサイトの別のデータを解析するのに
    チャレンジしてみるのもよいかもしれません。

    Webからデータととってくるのに便利な、requestsというモジュールを使います。
    インストールされていない場合は、こちらを参照してください。
    http://docs.python-requests.org/en/latest/
    CSV形式のテキストデータをファイルのように扱うために、StringIOを利用します。
    StringIOの詳しい解説（英語）
    https://pymotw.com/2/StringIO/
"""


# データのURLです。
url = "http://elections.huffingtonpost.com/pollster/2012-general-election-romney-vs-obama.csv"

# requestsをつかってデータをtextとして取得します。
source = requests.get(url).text

# StringIOを使ってpandasのエラーを防ぎます。
poll_data = StringIO(source)

poll_df = pd.read_csv(poll_data)

# データの概要です。
poll_df.info()
poll_df.head()
"""
    Pollster : どこが調査したか
    Start date ~ End Date : 調査の期間
    Number of Observations : 何人を対象に
    Population : どんな人だったか
    Mode : 何を通じて世論調査を行なったか
    Obama : オバマ支持
    Romney : ロムニー支持
    Undecided : 決めかねている
    Affiliation : 支持している政党の名前　Dem(民主党), Rep(共和党)
"""


poll_df[["Pollster", "Partisan", "Affiliation"]
        ].sort_values("Pollster").drop_duplicates()


sns.countplot("Affiliation", data=poll_df)
plt.show()
"""
    概ね中立のように見えますが、民主党寄りの調査主体が多いようにも見えます。このことは、
    頭に入れておいてもいいかもしれません。調査対象の人々の属性で層別化してみましょう。
"""

sns.countplot("Affiliation", data=poll_df, hue="Population",
              order=["Rep", "Dem", "None"])
plt.show()
"""
    概ね、選挙の投票に関連のある人々を対象にしているようですので、調査結果は信頼できそうです。
    別の角度から解析を進めてみましょう。
"""

poll_df.head()

"""
    オバマ、ロムニー、未定の3つの選択肢について、それぞれ平均的な支持率を計算してみます。
"""

# 平均をとると、数値の列だけが残るので、いらないNumber of Observationsを削除します。
avg = pd.DataFrame(poll_df.mean())
avg
avg.drop('Number of Observations', axis=0, inplace=True)
avg.drop("Other", axis=0, inplace=True)
avg.drop("Question Text", axis=0, inplace=True)
avg.drop("Question Iteration", axis=0, inplace=True)
avg.head()
# 同じように、標準偏差を計算します。
std = pd.DataFrame(poll_df.std())
std.drop('Number of Observations', axis=0, inplace=True)
std.drop("Other", axis=0, inplace=True)
std.drop("Question Text", axis=0, inplace=True)
std.drop("Question Iteration", axis=0, inplace=True)
std.head()

# pandas標準のplotで描画します。エラーバーも付けておきましょう。
avg.plot(yerr=std, kind='bar', legend=False)
poll_avg = pd.concat([avg, std], axis=1)
poll_avg.columns = ['Average', "STD"]
poll_avg


"""

非常に接戦の選挙戦に見えます。ただ、未定の人達は、いざ投票が始まれば、
どちらかに投票することになるので、その動向が注目されます。ここはひとまず、未定の人達が、
半分ずつ、両候補へ分かれると仮定して、選挙戦の最終的な結果を推定してみましょう。

"""


poll_df.head()

poll_df.plot(x='End Date', y=["Obama", "Romney",
                              "Undecided"], marker='o', linestyle="")

plt.show()
