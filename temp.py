import json
import sys


f = open('pythonOut.txt', 'w')
sys.stdout = f

f1 = open('faculty.json')
data1 = json.load(f1)
f1.close()

f2 = open('userdata.json')
data2 = json.load(f2)
f2.close()

data2 = data2[2]['data']

for i in range(len(data1)):
    mail = data1[i]['mail']
    loc = ''
    if (mail and mail != '') :
        for j in range(len(data2)):
            if (data2[j]['username'] == mail):
                loc = data2[j]['phd']
                break
    data1[i]['phd'] = loc
    print(data1[i]['name']+'    '+loc)

    