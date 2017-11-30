import sys
import json

import webbrowser
import pandas_datareader
import pandas as pd
import html5lib
import lxml
from pandas import DataFrame
from sklearn.datasets import load_boston

cat lec25.csv

dframe = pd.read_csv('lec25.csv')
dframe
dframe = pd.read_csv('lec25.csv', header=None)
dframe
dframe = pd.read_table('lec25.csv', sep=',', header=None)
dframe
pd.read_csv('lec25.csv', header=None, nrows=2)
dframe.to_csv('mytextdata_out.csv')

cat mytextdata_out.csv
dframe.to_csv(sys.stdout)
dframe.to_csv('mytextdata_out.csv', sep='_')

# JSON (JavaScript Object Notation) のサンプル。
json_obj = """{   "zoo_animal": "Lion",
        "food": ["Meat", "Veggies", "Honey"],
        "fur": "Golden",
        "clothes": null,
        "diet": [{"zoo_animal": "Gazelle", "food":"grass", "fur": "Brown"}]
    }"""
data = json.loads(json_obj)
data
data['diet']
json.dumps(data)
dframe = DataFrame(data['diet'])
dframe

json.dump(data, open('data.json', 'w'))
cat data.json
json.load(open('data.json'))


url = 'http://www.fdic.gov/bank/individual/failed/banklist.html'
webbrowser.open('http://www.fdic.gov/bank/individual/failed/banklist.html')
dframe_list = pd.read_html(url, flavor='html5lib')

dframe = dframe_list[0]
dframe_list[0]
dframe.columns.values


dframe = pd.read_excel('Lec_28_test.xlsx',
                       sheetname='Sheet1')

dframe
