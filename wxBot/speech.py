#!/usr/bin/env python
# coding: utf-8
#

from aip import AipSpeech
import struct
from pydub import AudioSegment ###需要安装pydub、ffmpeg
import binascii


class baidu_speech():
    def __init__(self,app_id,api_key,secret_key):
        self.aipSpeech = AipSpeech(app_id, api_key, secret_key)
    def synthesis(self,per, word,file):
        result = self.aipSpeech.synthesis(word, 'zh', 1, {'vol': 5, 'per':per,})
        if not isinstance(result, dict):
            with open(file, 'wb') as f:
                f.write(result)
    def asr(self,voice):
        result = self.aipSpeech.asr(self.get_file_content(voice), 'wav', 16000, {
            'lan': 'zh',
        })

        if isinstance(result,dict) and result['err_no'] == 0:
            return result['result'][0]
        else:
            print result
            return None

    def get_file_content(self,filePath):
        with open(filePath, 'rb') as fp:
            return fp.read()

    def save_voice_file(self, voice_ascii_data, output_file):
        bdata = binascii.a2b_hex(voice_ascii_data)
        with open(output_file, 'wb') as f:
            f.write(bdata)

    def convert_mp3_2_wav(self,mp3_file,wav_file):
        sound = AudioSegment.from_mp3(mp3_file)
        sound.export(wav_file, format="wav")
    def convert_bin_2_ascii(self,mp3_files):
        return binascii.b2a_hex(self.get_file_content(mp3_files))




