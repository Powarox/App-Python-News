from pathlib import Path
from Utilitary import Utilitary
from BeautifulSoup import Crawler
from Spotlight import Spotlight


# Instanciation
utilitary = Utilitary()


# Exemple url
article1 = 'https://www.bbc.com/news/newsbeat-56264594'
article2 = 'https://www.bbc.com/news/technology-56357526'
article3 = 'https://www.bbc.com/news/world-asia-56252695'

listExemple = list()
listExemple.append(article1)
listExemple.append(article2)
listExemple.append(article3)


# Main
i = 0
for url in listExemple:
    i += 1
    parsed = Crawler(url)
    folder = 'Ex' + str(i)

    # Save Article Images
    index = 0
    for src in parsed.allImg:
        utilitary.saveImgUrl(src, folder + '/Img/image' + str(index) + '.jpg')
        index += 1

    # Save Article Content
    data = dict()
    data['title'] = parsed.title
    data['sousTitle'] = parsed.sousTitle
    data['content'] = parsed.body

    jsonData = utilitary.jsonEncode(data)
    utilitary.saveFile(jsonData, folder + '/JsonContentFile')




# # Exemple 1
# parsed = BBC('https://www.bbc.com/news/newsbeat-56264594')
# # Save Article Images
# index = 0
# for src in parsed.allImg:
#     saveImgUrl(src, 'Ex1/Img/image' + str(index) + '.jpg')
#     index += 1
#
# # Save Article Content
# data = dict()
# data['title'] = parsed.title
# data['sousTitle'] = parsed.sousTitle
# data['content'] = parsed.body
#
# jsonData = jsonEncode(data)
# saveFile(jsonData, 'Ex1/JsonContentFile')



# # Exemple 2
# parsed = BBC('https://www.bbc.com/news/technology-56357526')
# # Save Article Images
# index = 0
# for src in parsed.allImg:
#     saveImgUrl(src, 'Ex2/Img/image' + str(index) + '.jpg')
#     index += 1
#
# # Save Article Content
# data = dict()
# data['title'] = parsed.title
# data['sousTitle'] = parsed.sousTitle
# data['content'] = parsed.body
#
# jsonData = jsonEncode(data)
# saveFile(jsonData, 'Ex2/JsonContentFile')



# # Exemple 3
# parsed = BBC('https://www.bbc.com/news/world-asia-56252695')
# # Save Article Images
# index = 0
# for src in parsed.allImg:
#     saveImgUrl(src, 'Ex3/Img/image' + str(index) + '.jpg')
#     index += 1
#
# # Save Article Content
# data = dict()
# data['title'] = parsed.title
# data['sousTitle'] = parsed.sousTitle
# data['content'] = parsed.body
#
# jsonData = jsonEncode(data)
# saveFile(jsonData, 'Ex3/JsonContentFile')
