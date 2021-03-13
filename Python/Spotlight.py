import spotlight
import requests

class Spotlight:
    annotations = spotlight.annotate('http://localhost/res/annotate',
        'this is a text', confidence = 0.4, support = 20)
