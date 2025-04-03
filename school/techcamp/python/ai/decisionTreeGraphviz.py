import os
from tempfile import mkstemp
import subprocess

from sklearn.tree.export import export_graphviz


def convert_decision_tree_to_ipython_image(clf, feature_names=None, class_names=None,
                                           image_filename=None, tmp_dir=None):
    dot_filename = mkstemp(suffix='.dot', dir=tmp_dir)[1]
    with open(dot_filename, "w") as out_file:
        export_graphviz(clf, out_file=out_file,
                        feature_names=feature_names,
                        class_names=class_names,
                        filled=True, rounded=True,
                        special_characters=True)

    from IPython.display import Image

    image_filename = image_filename or ('%s.png' % dot_filename)

    subprocess.call(('dot -Tpng -o %s %s' %
                     (image_filename, dot_filename)).split(' '))
    image = Image(filename=image_filename)
    os.remove(dot_filename)
    return image


from sklearn import datasets
from sklearn.tree.tree import DecisionTreeClassifier
%matplotlib inline

iris = datasets.load_iris()
X = iris.data
Y = iris.target

clf = DecisionTreeClassifier(max_depth=3)
clf.fit(X, Y)
convert_decision_tree_to_ipython_image(clf, image_filename='tree.png')
