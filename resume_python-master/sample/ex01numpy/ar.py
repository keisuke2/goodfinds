# coding: UTF-8
import numpy 

# numpy.array() で配列を生成する
# 第1匹数に配列の内容
# 第2引数に配列の型

ar1d = numpy.array([1, 2, 3], numpy.int32)
# 1次元配列の例
print ar1d

ar2d = numpy.array([[1, 2, 3], [10, 11, 12]], numpy.int32)
# 2次元配列の例
print ar2d

ar = numpy.array([0.1, 2, 3])
# 第2引数を省略した時は配列の先頭の値の型で値を揃える
print ar

