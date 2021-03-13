import json
import requests
from bs4 import BeautifulSoup as bs


# BeautifulSoup Class
class Crawler:
    def __init__(self, url):
        req = requests.get(url)
        self.soup = bs(req.content, 'html.parser')
        self.body = self.get_body()
        self.title = self.get_title()
        self.sousTitle = self.get_sous_title()
        self.image = self.get_image()
        self.allImg = self.get_all_images()

    def get_title(self):
        return self.soup.h1.string # self.soup.title.string

    def get_sous_title(self):
        article = self.soup.find('article')
        return [h2.text for h2 in article.find_all('h2')]

    def get_body(self):
        body = self.soup.find('body')
        return [p.text for p in body.find_all('p')]

    def get_image(self):
        image = self.soup.find('img')
        return image

    def get_all_images(self):
        article = self.soup.find('article')
        return [img['src'] for img in article.find_all('img')]


















# parsed = Wiki('https://en.wikipedia.org/wiki/Python_(programming_language)')











# print(soup.title)
# # <title>Python (programming language) - Wikipedia</title>
#
# print(soup.title.name)
# # 'title'
#
# print(soup.title.string)
# # 'Python (programming language) - Wikipedia'
#
# print(soup.h1)
# # <h1 class="firstHeading" id="firstHeading" lang="en">Python (programming language)</h1>
#
# print(soup.h1.string)
# # 'Python (programming language)'
#
# print(soup.h1['class'])
# # ['firstHeading']
#
# print(soup.h1['id'])
# # 'firstHeading'
#
# print(soup.h1.attrs)
# # {'class': ['firstHeading'], 'id': 'firstHeading', 'lang': 'en'}
#
# soup.h1['class'] = 'firstHeading, mainHeading'
# soup.h1.string.replace_with("Python - Programming Language")
# del soup.h1['lang']
# del soup.h1['id']
#
# soup.h1
# # <h1 class="firstHeading, mainHeading">Python - Programming Language</h1>
#
#
#
# for sub_heading in soup.find_all('h2'):
#     print(sub_heading.text)
#
# all the sub-headings like Contents, History[edit]...
#
# print(soup.find_all('p'))


# class BBC:
#     def __init__(self, url:str):
#         article = requests.get(url)
#         self.soup = bs(article.content, "html.parser")
#         self.body = self.get_body()
#         self.title = self.get_title()
#
#     def get_body(self) -> list:
#         body = self.soup.find(property="articleBody")
#         return [p.text for p in body.find_all("p")]
#
#     def get_title(self) -> str:
#         return self.soup.find(class_="story-body__h1").text
#
#
# parsed = BBC("https://www.bbc.com/news/uk-56313099")
#
#
# parsed.title
#
# parsed.body

#
