import spotlight
import requests

annotations = spotlight.annotate('http://localhost/res/annotate',
    'this is a text', confidence = 0.4, support = 20)
