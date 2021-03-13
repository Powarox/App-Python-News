"# Knowledge-Acquisition"


Exemple 1 : https://www.bbc.com/news/newsbeat-56264594

Exemple 2 : https://www.bbc.com/news/technology-56357526

Exemple 3 : https://www.bbc.com/news/world-asia-56252695


from PIL import Image
import matplotlib.pyplot as plt
from wordcloud import WordCloud, ImageColorGenerator

# WordCloud Save
    def wordCloudSave(self, elem, name):
        WordCloud.to_file(elem, "../AppTraitement/Result/" + self.folder + name)


# MathplotLib Save
    def matplotlibSave(self, name):
        plt.savefig("../AppTraitement/Result/" + self.folder + name, format = "png")


import urllib.request

urllib.request.urlretrieve("http://www.digimouth.com/news/media/2011/09/google-logo.jpg", "local-filename.jpg")
