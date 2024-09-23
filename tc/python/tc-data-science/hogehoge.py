from PIL import Image
import matplotlib.pyplot as plt

im = Image.open("/Users/miyazonoeiji/Downloads/サーバーの歴史.png")
# box=(左上のx座標, 左上のy座標, 右下のx座標, 右下のy座標)
im_crop = im.crop((10, 20, 100, 200))
im_crop.show()
