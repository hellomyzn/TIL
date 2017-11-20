from sklearn.datasets import load_iris
from sklearn.cross_validation import train_test_split
import pandas as pd
iris = load_iris()

pd.DataFrame(data = iris.data,columns = iris.feature_names)
x = iris.data
x_train, x_test = train_test_split(x, test_size=0.3)

print(len(x_train))
print(len(x_test))
