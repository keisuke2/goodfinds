# coding: UTF-8
list1 = []
list2 = [1,2,3]
if (list1 or list2):
  print "list1 or list2 are not empty" # 実行される
if (list1 and list2):
  print "list1 and list2 are not empty" # 実行されない
if not list1:
  print "list1 is not empty" # 実行される
if not list2:
  print "list2 is not empty" #実行されない
