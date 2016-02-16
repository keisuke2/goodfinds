# coding: UTF-8
import urllib2
import json
import time

# 天気予報ページのヘッダを設定
contents = u"""
<html>
<head>
<meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
<title>天気予報</title>
</head>
"""

# Weather Hacksからデータ読み込み
weather_path = "http://weather.livedoor.com/forecast/webservice/json/v1?city=130010"
time.sleep(1) # 読み込み失敗防止のため、Wait処理を掛ける
resp = urllib2.urlopen(weather_path).read()

# 読み込んだJSONデータをディクショナリ型に変換
resp = json.loads(resp)

# respデータから天気予報ページの中身を作成
contents += """
<body>
<h1>%s</h1>

<p>
%s
</p>
""" % (resp['title'], resp['description']['text'])

for forecast in resp['forecasts']:
  contents +=  "<p>%s (%s) : %s </p>\n" % (forecast['dateLabel'], forecast['date'], forecast['telop'])

contents += """
</body>
</html>
"""

# print contents # ファイルに書き込む文字列の内容を確認できます

# 天気予報ページをweather.htmlに出力
f = open('weather.html', 'w') # weather.htmlファイルを書き込みモードで開く
text = contents.encode('utf_8')
f.write(text)
f.close()
