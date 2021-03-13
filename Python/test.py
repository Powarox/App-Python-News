import sys
import json
from pathlib import Path

print(sys.argv[1])

data = json.loads(sys.argv[1])
print(data)
send = json.dumps(data)


print(send)






# import requests
# data = json.loads(requests.data)
# send = json.dumps(data)
# url = 'https://dev-21606393.users.info.unicaen.fr/M1/Knowledge/Python/index.php'
# req = requests.post(url, data = send)
# print(req.text)



# with open(Path("../Python/JsonFile.json"), "w") as filout:
#     result = send
#     filout.write(result)



# try:
#     data = json.loads(request.data)
#     print(data)
#     # return "Success" 200
# except ValueError:
#     error('Unable to parse JSON data from request.')
#     # return "Error" 400
