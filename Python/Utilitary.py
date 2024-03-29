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
        WordCloud.to_file(elem, self.path + self.folder + name)

    # MathplotLib Save Image
    def matplotlibSave(self, name):
        plt.savefig(self.path + self.folder + name, format = "png")

    # Save Img from url
    def saveImgUrl(self, url, name):
        urllib.request.urlretrieve(url, self.path + name)

    # Save data to json file
    def saveFile(self, data, name):
        with open(self.path + name + '.json', "w") as filout:
            result = data
            filout.write(result)

    # Encode data to jsonArray
    def jsonEncode(self, data):
        jsonData = json.dumps(data)
        return jsonData

    # Decode jsonArray to data
    def jsonDecode(self, jsonData):
        data = json.loads(jsonData)
        return data
