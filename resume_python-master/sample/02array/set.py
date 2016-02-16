# coding: UTF-8
a = set([1, 2, 3, 4, 3, 2])
print a

b = set([3, 4, 5])
print a - b   # 差集合
print a | b  # 和集合
print a & b # 積集合 どちらにもあるもの
print a ^ b  # どちらかにしかないもの
