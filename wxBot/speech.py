#!/usr/bin/env python
# coding: utf-8
#

from aip import AipSpeech
""" 你的 APPID AK SK """

class baidu_speech():
    def __init__(self,app_id,api_key,secret_key):
        self.aipSpeech = AipSpeech(app_id, api_key, secret_key)
    def synthesis(self,per, word,file):
        result = self.aipSpeech.synthesis(word, 'zh', 1, {'vol': 5, 'per':per,})
        if not isinstance(result, dict):
            with open(file, 'wb') as f:
                f.write(result)
"""
if __name__ == '__main__':
    s = Speech()
    result = s.synthesis('你好百度','auido.mp3')
"""


