import json
import requests

data = json.loads(request.data)

send = json.dumps(data)

url = 'https://dev-21606393.users.info.unicaen.fr/M1/Knowledge/WebInterface/index.html'
req = request.post(url, data = send)

print(req.text)



#
# from requests import Session
#
# session = Session()
#
# # HEAD requests ask for *just* the headers, which is all you need to grab the
# # session cookie
# session.head('http://sportsbeta.ladbrokes.com/football')
#
# response = session.post(
#     url='http://sportsbeta.ladbrokes.com/view/EventDetailPageComponentController',
#     data={
#         'N': '4294966750',
#         'form-trigger': 'moreId',
#         'moreId': '156#327',
#         'pageType': 'EventClass'
#     },
#     headers={
#         'Referer': 'http://sportsbeta.ladbrokes.com/football'
#     }
# )
#
# print response.text




# try:
#     data = json.loads(request.data)
#     print(data)
#     # return "Success" 200
# except ValueError:
#     error('Unable to parse JSON data from request.')
#     # return "Error" 400
