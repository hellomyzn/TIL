"""
類似した映画を見つける
MoviewLensのデータを読み込むところから始めます。Pandasを用いることで、
今回用いるu.dataとu.itemファイルの全ての行を素早く読み込み、
movie_idを用いて二つのデータを結合させることができます。
"""

import numpy as np
import pandas as pd
r_cols = ['user_id', 'movie_id', 'rating']
ratings = pd.read_csv(
    '/Users/miyazonoeiji/projects/python/udemy/practicalDataScience/statisticsAndProbability/ml-100k/u.data',
    sep='\t',
    names=r_cols,
    usecols=range(3),
    encoding="ISO-8859-1")

m_cols = ['movie_id', 'title']
movies = pd.read_csv(
    '/Users/miyazonoeiji/projects/python/udemy/practicalDataScience/statisticsAndProbability/ml-100k/u.item',
    sep='|',
    names=m_cols,
    usecols=range(2),
    encoding="ISO-8859-1")

movies = pd.read_csv(
    '/Users/miyazonoeiji/projects/python/udemy/practicalDataScience/statisticsAndProbability/ml-100k/u.item',
    sep='|',
    names=m_cols,
    usecols=range(2),
    encoding="ISO-8859-1")
ratings = pd.merge(movies, ratings)

ratings.head()
"""
DataFrameのpivot_table関数により、user / movieのマトリックスを作ることができます。
NaNはユーザーによる評点が行われず、データが無いことを意味します。
"""

movieRatings = ratings.pivot_table(
    index=['user_id'],
    columns=['title'],
    values='rating')

movieRatings.head()
movieRatings.shape
starWarsRatings = movieRatings['Star Wars (1977)']
starWarsRatings.head()
"""
Pandasのcorrwith関数は、スターウォーズのユーザー評点ベクトルと、他の映画のユーザー評点
ベクトルのペアワイズ相関を簡単に計算してくれます。その後、データがない個所を結果から削除し、
スターウォーズとの相関のスコアを含む新しいDataFrameを作ります。
"""

similarMovies = movieRatings.corrwith(starWarsRatings)
similarMovies = similarMovies.dropna()
df = pd.DataFrame(similarMovies)
df.head(10)
"""
(Warningは無視しても大丈夫です。) 類似度スコアでソートしましょう。そして、
最もスターウォーズと類似度の高い映画が。。。見つかりませんでした。
この結果は全く役に立ちませんね。何か、大事なことを見逃しているようです。
"""

similarMovies.sort_values(ascending=False)

"""
おそらく今回の結果は、たまたまスターウォーズを見た、少数の人々によって鑑賞された映画によって
おかしくされているのでしょう。従って、今回のおかしな結果を生じさせている、少数の人々によって
鑑賞された映画を削除しなければいけません。各映画にいくつの評点があるのか、評点の平均値は
いくつかを計算するDataFrameを作りましょう。
"""
movieStats = ratings.groupby('title').agg({'rating': [np.size, np.mean]})
movieStats.head()

"""
評価の数が100より少ない映画を削除して、残った映画を評点が高い順に並べましょう。
"""

popularMovies = movieStats['rating']['size'] >= 100
movieStats[popularMovies].sort_values(
    [('rating', 'mean')], ascending=False)[:15]

"""
100は小さすぎるかもしれませんね。しかしながら、
みんなが聞いたことのある映画で、評点の高い映画をうまく取り出せています。
このデータを、もとのスターウォーズの類似映画のセットに加えましょう。
"""

df = movieStats[popularMovies].join(
    pd.DataFrame(similarMovies, columns=['similarity']))

df.head()
"""
そして、この新しい結果を類似度スコアでソートしましょう。いい感じですね。
"""
df.sort_values(['similarity'], ascending=False)[:15]
"""
理想的には、スターウォーズの映画（もちろん類似度は100%）自身は除くべきですが、悪くない結果ですね。
"""
