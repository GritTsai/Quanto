#!/usr/bin/env python
# coding: utf-8
#

import binascii
import time
import mp3play
from aip import AipSpeech
from pydub import AudioSegment  # 需要安装pydub、ffmpeg


class BaiduSpeech:
    def __init__(self, app_id, api_key, secret_key):
        self.aipSpeech = AipSpeech(app_id, api_key, secret_key)

    def synthesis(self, per, word, syn_file):
        result = self.aipSpeech.synthesis(word, 'zh', 1, {'vol': 5, 'per': per, })
        if not isinstance(result, dict):
            with open(syn_file, 'wb') as f:
                f.write(result)

    def asr(self, voice):
        result = self.aipSpeech.asr(self.get_file_content(voice), 'wav', 8000, {
            'lan': 'zh',
        })

        if isinstance(result, dict) and result['err_no'] == 0:
            return result['result'][0]
        else:
            print result
            return None

    @staticmethod
    def get_file_content(file_path):
        with open(file_path, 'rb') as fp:
            return fp.read()

    @staticmethod
    def save_voice_file(voice_ascii_data, output_file):
        data = binascii.a2b_hex(voice_ascii_data)
        with open(output_file, 'wb') as f:
            f.write(data)

    @staticmethod
    def convert_bin_2_ascii(mp3_files):
        return binascii.b2a_hex(BaiduSpeech.get_file_content(mp3_files))

    @staticmethod
    def convert_mp3_2_wav(mp3_file, wav_file):
        sound = AudioSegment.from_mp3(mp3_file)
        sound.export(wav_file, format="wav")

    @staticmethod
    def play_mp3(mp3_file):
        f = mp3play.load(mp3_file)
        f.play()
        time.sleep(min(150, f.seconds() + 1))
