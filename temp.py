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
    projects = ''
    if (mail and mail != '') :
        for j in range(len(data2)):
            if (data2[j]['username'] == mail):
                projects = data2[j]['projects']
                break
    data1[i]['projects'] = projects
    print(data1[i]['name'], " ", projects)

# print(data1)

#jsonData = json.dumps(data1)


##f = open("pythonOut.json", "w")
#f.write(jsonData)

    



    