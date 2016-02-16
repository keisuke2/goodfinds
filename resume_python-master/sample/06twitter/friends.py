# coding: utf-8

import tweepy

consumer_key = ''
consumer_secret = ''
access_token = ''
access_token_secret = ''

auth = tweepy.OAuthHandler(consumer_key, consumer_secret)
auth.set_access_token(access_token, access_token_secret)

api = tweepy.API(auth)

friends = []
for page in tweepy.Cursor(api.followers, screen_name="GfEngineer").pages():
    friends.extend(page)

for friend in friends:
    print friend.screen_name