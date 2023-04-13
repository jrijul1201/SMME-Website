import json
import sys
import random
import string

f = open('faculty.json')

data = json.load(f)

# print(data[0]['irins_pub'])

for i in range(len(data)):
    dt = data[i]['irins_pub']
    for j in range(len(dt)):
        res = ''.join(random.choices(string.ascii_uppercase + string.digits, k = 8))
        dt[j]['id'] = res

with open('faculty.json', 'w') as outfile:
    json.dump(data, outfile)