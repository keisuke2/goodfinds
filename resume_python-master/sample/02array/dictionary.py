# coding: UTF-8
prof= {"name" : "saji", "age" : 32, "job" : "engineer"}
print prof
print prof["age"] #  年齢のみ表示
prof["job"] = "sales" # 職業を変更
print prof

print "salary" in prof   # ディクショナリにキーが存在するか
print prof.keys()         # キーの一覧
print prof.values()     # 値の一覧
print prof.items()      # (キー、値)のタプルオブジェクトのリスト
