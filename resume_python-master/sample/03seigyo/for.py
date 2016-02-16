# coding: UTF-8
sum = 0
values = [1,2, 10,200]

for val in values:  # valuesの中身毎に繰り返し処理を行う
  print val         # valuesの中身がvalに入っている
  sum += val

print u"valuesの合計値" + str(sum)
