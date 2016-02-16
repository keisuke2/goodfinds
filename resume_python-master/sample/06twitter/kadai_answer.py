# coding: utf-8
import tweepy
import time

import matplotlib.pyplot as plt
from datetime import datetime as dt

consumer_key = ''
consumer_secret = ''
access_token = ''
access_token_secret = ''

auth = tweepy.OAuthHandler(consumer_key, consumer_secret)
auth.set_access_token(access_token, access_token_secret)

api = tweepy.API(auth)

timelines = []
for page in tweepy.Cursor(api.user_timeline, screen_name="GfEngineer").pages():
    timelines.extend(page)

dates = []
counts = []
count = 0
for timeline in timelines:
    dates.append(timeline.created_at) # 日時を配列に保存
    count += 1
    counts.append(count) # tweet回数
    print str(timeline.created_at) + "\n" # 日時を表示
    print timeline.text.encode('utf-8') + "\n" # 内容を表示

# tweet日時の配列を新しい順から古い順に変更する
dates.reverse()

# グラフに表示
plt.plot(dates, counts)
plt.show()
