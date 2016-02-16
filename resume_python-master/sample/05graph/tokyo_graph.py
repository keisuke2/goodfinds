# coding: utf-8
import matplotlib.pyplot as plt
from datetime import datetime as dt

itemList = []
for line in open('tokyo.csv', 'r'):
    itemList.append(line.rstrip().split(','))

date = []
temparature = []
for item in itemList:
  date.append(dt.strptime(item[0], '%Y/%m/%d'))
  temparature.append(float(item[1]))

plt.plot(date, temparature)
plt.show()