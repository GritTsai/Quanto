import urllib2
import time
import BaseShareType
import DataProvider
class SinaProvider(DataProvider.DataProvider):

    def __init__(self):
        self.api_url = "http://hq.sinajs.cn/list="

    def get_real_data(self,id):
        if id >= 600000:
            urls = self.api_url + "sh"
        else:
            urls = self.api_url + "sz"
        urls=urls+str(id)
        #print urls
        req = urllib2.Request(urls)
        response = urllib2.urlopen(req)
        the_page = response.read()
        rsp = the_page.decode('gb2312').encode('utf-8')
        #print rsp
        return self.parse_share_data(rsp)
    def parse_share_data(self, rsp):
        datas = rsp.split('=')[1].split('"')[1].split(",")

#        print datas[0]
        share = BaseShareType.BaseShareType()
        share.name = datas[0]
        if len(datas) <= 1:
            return None
        share.opening_price = datas[1]
        share.last_closing_price = datas[2]
        share.price = datas[3]
        share.max_price = datas[4]  # 4.today maximum price
        share.min_price = datas[5]  # 5.today minimum price
        share.bid_buy_price = datas[6]  # 6.is buy 1 price
        share.bid_sell_price = datas[7]  # 7. is sell 1 price
        share.vol_amount = datas[8]  # 8 the exchanged share amount, with a unit of 100 shares
        share.vol_value = datas[9]  # 9 the exchanged mount, with a unit of ten thousand yuan
        share.b1_amount = datas[10]  # 10, the amount in 100 shares to be exchanged,
        share.b1_price = datas[11]  # 11 the buy one price
        share.b2_amount = datas[12]  # 12
        share.b2_price = datas[13]  # 13
        share.b3_amount = datas[14]  # 14
        share.b3_price = datas[15]  # 15
        share.b4_amount = datas[16]  # 16
        share.b4_price = datas[17]  # 17
        share.b5_amount = datas[18]  # 18,
        share.b5_price = datas[19]  # 19
        share.s1_amount = datas[20]  # 20, the amount in 100 shares to be exchanged,
        share.s1_price = datas[21]  # 21 the buy one price
        share.s2_amount = datas[22]  # 22
        share.s2_price = datas[23]  # 23
        share.s3_amount = datas[24]  # 24
        share.s3_price = datas[25]  # 25
        share.s4_amount = datas[26]  # 26
        share.s4_price = datas[27]  # 27
        share.s5_amount = datas[28]  # 28,
        share.s5_price = datas[29]  # 29
        share.dates = datas[30]    #30 "2008-01-11",date
        share.times = datas[31]    # ,31,"15:05:32",time
        return share


