import json
import urllib.request
from PIL import Image
import matplotlib.pyplot as plt
from wordcloud import WordCloud, ImageColorGenerator


class Utilitary:
    def __init__(self):
        self.path = '../Python/Result/'

    # WordCloud Save Image
    def wordCloudSave(self, elem, name):
        WordCloud.to_file(elem, "../Python/Result/" + self.folder + name)

    # MathplotLib Save Image
    def matplotlibSave(self, name):
        plt.savefig("../Python/Result/" + self.folder + name, format = "png")

    # Save Img from url
    def saveImgUrl(self, url, name):
        urllib.request.urlretrieve(url, '../Python/Result/Img/' + name)

    # Save data to json file
    def saveFile(self, data):
        with open(Path("../Python/Result/JsonFile.json"), "w") as filout:
            result = data
            filout.write(result)

    # Encode data array to json array
    def jsonEncode(self, data):
        # data = json.loads(jsonData)
        jsonData = json.dumps(data)
        return jsonData
