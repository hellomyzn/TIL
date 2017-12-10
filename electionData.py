
import pandas as pd
import numpy as numpy
import matplotlib.pyplot as plt
import seaborn as sns
# Webからデータを取得するために、requestsをインポートします。
import requests
from pandas import Series, DataFrame
from datetime import datetime
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

"""
    オバマとロムニーの支持率の差を計算し、新しい列に保存します。
"""

poll_df['Difference'] = (poll_df.Obama - poll_df.Romney) / 100
poll_df.head()

"""
    Difference列は、「Obama - Romney」です。正の数は、オバマのリードを意味します。
    これを使って、支持率の差が時間とともに、どう変化したかを計算します。同じ期間に行われた
    調査もあるので、groupbyを使って、データを整理しましょう。
"""

poll_df = poll_df.groupby(['Start Date'], as_index=False).mean()
poll_df.head()

fig = poll_df.plot("Start Date",
                   "Difference",
                   figsize=(12, 4),
                   marker="o",
                   linestyle="-",
                   color="purple")
plt.show()

"""
    候補者同士の討論会があった日付を、このプロットに描き込むと面白いかも知れません。
    2012の討論会があったのは、10/3、10/11、10/22です。これらを描き込んでみましょう。
    2012年の10月が、X軸上のいくつ目のデータなのかを知る必要があります。 ここは単純に、
    2012/10のデータを見て、どのindexをとればいいか確認することにしましょう。
"""


poll_df[poll_df['Start Date'].apply(lambda x:x.startswith("2012-10"))]

fig = poll_df.plot("Start Date",
                   "Difference",
                   figsize=(12, 4),
                   marker="o",
                   linestyle="-",
                   color="purple",
                   xlim=(325, 352))
plt.axvline(x=326, linewidth=4, color="gray")
plt.axvline(x=333, linewidth=4, color="gray")
plt.axvline(x=343, linewidth=4, color="gray")
plt.show()


"""
    米国大統領選挙に馴染みが薄いので、データの解釈は難しいですが、
    このような解析が役に立つのはおわかりいただけるかと思います。

    こうしたデータを解釈する際は、様々な要因に注意を払う必要もあります。例えば、
    これらの世論調査が全米のどの場所で行われたかなども、世論調査の結果に大きく影響します
"""

"""
    寄付のデータ
    話題を変えて、両陣営への寄付に関するデータを分析していくことにします。
    これまでで一番大きなデータセット（約150MB)になります。ここからダウンロード出来ます ,
    https://www.dropbox.com/s/ltyfa5eba9a4tcm/Election_Donor_Data.csv?dl=0
    Notebookが起動しているフォルダと同じ場所に保存しておきましょう。
    このデータは、次の視点から分析を進めることにします。
    1.) 寄付の金額とその平均的な額
    2.) 候補者ごとの寄付の違い
    3.) 民主党と共和党での寄付の違い
    4.) 寄付した人々の属性について
    5.) 寄付の総額になんらかのパターンがあるか？
"""

donor_df = pd.read_csv(
    '/Users/miyazonoeiji/Downloads/data/Election_Donor_Data.csv')
donor_df.info()

donor_df.head()
"""
    cmte_id 候補者のID
    cand_id 候補者のID
    cand_nm 候補者の名前
    contbr_nm　寄付する人の名前
    contbr_city 寄付した町
    contbr_occupation 寄付した人の職業
    contb_recipt_amt 寄付した額
"""

donor_df['contb_receipt_amt'].value_counts()

donor_df["contb_receipt_amt"].value_counts().shape

# 寄付の平均的な額
don_mean = donor_df['contb_receipt_amt'].mean()

# 標準偏差
don_std = donor_df['contb_receipt_amt'].std()

print('寄付の平均は{:0.2f}ドルで、その標準偏差は{:0.2f}です。'.format(don_mean, don_std))
top_donor = donor_df['contb_receipt_amt'].copy()
top_donor.sort_values()
"""
    負の数や、非常に大きな値が見えます。 負の数は、払い戻しのデータなどですので、
    ひとまず正の数だけに注目することにしましょう。

"""


top_donor = top_donor[top_donor > 0]
top_donor
top_donor.sort_values()
top_donor.value_counts().head(10)
com_don = top_donor[top_donor < 2500]
com_don.hist(bins=100, edgecolor="k")
plt.show()
"""

    Top10でも、10ドルから2,500ドルまで幅広いことがわかります。
    寄付の額は、10や50などキリの良い数字が多いのかどう書きになります。
    ヒストグラムを描いて、2,500ドルまでのデータを調べてみましょう。

"""


"""
    政党ごとに寄付の額をまとめて見ることにします。 これをするには、まず候補者のデータに注目して、
    候補者の所属政党でデータを分類する事を試みます。

"""

# 重複の無い候補者のデータを作って置きます。
candidates = donor_df.cand_nm.unique()
candidates


# 所属政党の辞書です。
party_map = {'Bachmann, Michelle': 'Republican',
             'Cain, Herman': 'Republican',
             'Gingrich, Newt': 'Republican',
             'Huntsman, Jon': 'Republican',
             'Johnson, Gary Earl': 'Republican',
             'McCotter, Thaddeus G': 'Republican',
             'Obama, Barack': 'Democrat',
             'Paul, Ron': 'Republican',
             'Pawlenty, Timothy': 'Republican',
             'Perry, Rick': 'Republican',
             "Roemer, Charles E. 'Buddy' III": 'Republican',
             'Romney, Mitt': 'Republican',
             'Santorum, Rick': 'Republican'}

# 以下のコードで、DataFrame全体を更新できます。
donor_df['Party'] = donor_df.cand_nm.map(party_map)
donor_df.head()

"""
もちろん、for文を使って同じ操作をすることが可能ですが、mapを使う方が早く終わります。

for i in xrange(0,len(donor_df)):
    if donor_df['cand_nm'][i] == 'Obama,Barack':
        donor_df['Party'][i] = 'Democrat'
    else:
        donor_df['Party'][i] = 'Republican'
"""

donor_df = donor_df[donor_df.contb_receipt_amt > 0]
donor_df.head()
donor_df.groupby('cand_nm')['contb_receipt_amt'].count()
cand_amount = donor_df.groupby('cand_nm')['contb_receipt_amt'].sum()
for i, n in enumerate(cand_amount):
    print("{}は、{:.0f}ドル集めました。\n".format(cand_amount.index[i], n))


cand_amount.plot(kind="bar")
plt.show()
"""
比較が簡単になりました。 オバマ候補だけで100億円以上のお金が寄付で集まっているのがわかります。
今度は、政党別で比較してみましょう。

"""

donor_df.groupby('Party')['contb_receipt_amt'].sum().plot(kind="bar")
plt.show()

"""
民主党（Democrat）はオバマ候補1人ですので、政党の比較では、共和党優勢ですが、共和党候補者達は、
この額をみんなで分けているので、個人でみると厳しい情勢です。

最後に、寄付した人達の職業をまとめてみましょう。 まず、職業のデータを元のDataFrameから
抜き出して、これをもとに、ピボットテーブルを作ります。このとき、職業ごとに民主党と共和党への
寄付額が分かるようにします。 最後にこれらのデータをまとめて、
寄付者の属性ごとの寄付額を算出してみましょう。
"""


# 職業ごとに、政党別に分けて寄付額をまとめます。
occupation_df = donor_df.pivot_table('contb_receipt_amt',
                                     index='contbr_occupation',
                                     columns='Party', aggfunc='sum')

occupation_df.head(10)
occupation_df.shape

"""
4万5千以上の職種があるようで、簡単には描画できそうにありません。 閾値を決めて、
寄付の総額が小さい職種については、表示を省略するようにしてみます。
"""

occupation_df = occupation_df[occupation_df.sum(1) > 1000000]
occupation_df.plot(kind="bar")
plt.show()


# 横向き（水平：Horizontal）な図が描けました。
occupation_df.plot(kind='barh', figsize=(10, 12), cmap='seismic')
plt.show()

occupation_df

occupation_df.drop(['INFORMATION REQUESTED PER BEST EFFORTS',
                    'INFORMATION REQUESTED'], axis=0, inplace=True)
occupation_df = occupation_df[occupation_df.sum(1) > 1000000]
occupation_df.plot(kind="bar")
plt.show()


# CEOにまとめます。
occupation_df.loc['CEO'] = occupation_df.loc['CEO'] + \
    occupation_df.loc['C.E.O.']
# C.E.O.を消しましょう。
occupation_df
occupation_df.drop('C.E.O.', axis=0, inplace=True)

occupation_df.plot(kind='barh', figsize=(10, 12), cmap='seismic')
plt.show()

"""

CEO（企業経営者）は、保守的な思想の持ち主のように見えます。
両党の税に対する考え方が反映されているのかも知れません。
お疲れ様でした
選挙に関するデータを一通り解析しました。大きなデータセットなので、
工夫次第でまだまだやれることがあると思いますので、是非チャレンジしてみてください。
日本でも、選挙に関するデータ解析の事例があります。是非、参考にしてみてください。
http://event.yahoo.co.jp/bigdata/senkyo201307/



"""
